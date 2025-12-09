<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\oneTimePayment;
use App\Models\Packages;
use App\Models\PaymentHistory;
use App\Models\Subscriptions;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Stripe\Coupon;
use Stripe\Customer;
use Stripe\Invoice;
use Stripe\PaymentMethod;
use Stripe\Stripe;
use Stripe\Subscription;

class MemberSubscriptionController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('app.STRIPE_SECRET_KEY'));
    }
    public function subscriptions()
    {
        $packages = Packages::where('status', 1)->get();
        $active_package = Subscriptions::where('member_id', auth()->guard('member')->user()->id)->latest()->first();
        return view('members.my-account.subscriptions', compact('packages', 'active_package'));
    }
    public function subscriptionForm($id)
    {
        $package = Packages::where('id', $id)->first();
        return view('members.my-account.subscription-form',compact('package'));
    }

    public function validateCoupon(Request $request)
    {
        if($request->coupon == null)
        {
            return response()->json([
                'status' => 'neutral',
                'message' => 'Coupon not applied.',
            ], 200);
        }

        // Fetch all coupons from Stripe
        $coupons = Coupon::all();

        // Initialize a flag to check if the coupon is valid
        $isValidCoupon = false;
        $coupon_id = false;
        $coupon_discount_percent = null;
        $max_redemptions = 0;
        $times_redeemed = 0;
        $duration = null;

        // Check if the input coupon matches any of the Stripe coupons
        foreach ($coupons->data as $stripeCoupon) {
            if ($request->coupon == $stripeCoupon->name AND $stripeCoupon->valid == true) {
                $coupon_id = $stripeCoupon->id;
                $isValidCoupon = true;
                $coupon_discount_percent = $stripeCoupon->percent_off;
                $times_redeemed = $stripeCoupon->times_redeemed;
                $max_redemptions = $stripeCoupon->max_redemptions;
                $duration = $stripeCoupon->duration;
                break;
            }
        }

        // If the coupon is not valid, return an error
        if (!$isValidCoupon) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Coupon',
            ], 401);
        }

        return response()->json([
            'status' => true,
            'coupon_id' => $coupon_id,
            'coupon_discount_percent'=> $coupon_discount_percent,
            'max_redemptions'=> $max_redemptions,
            'times_redeemed'=> $times_redeemed,
            'duration' => $duration,
            'message' => 'Coupon applied successfully.',
        ], 200);
    }

    public function store_subscription(Request $request)
    {
        //to proceed like butter we follow these steps
        //using try catch and db transaction for error handling
        //1 //checked the coupon name and our coupon in stripe (already done on previous step)
        //2 //created payment method
        //3 //created customer
        //4 //attach the payment method to customer for future payments
        //5 //update user table with stripe's customer_id
        //6 //subscribe use to product on stripe with or without coupon
        try {
            DB::beginTransaction();

            //parsing serialized form data to an array
            $formData = [];
            parse_str($request->input('formData'), $formData);

            //getting package
            $package = Packages::where('id', $formData['package_id'])->first();

            //creating payment method
            $paymentMethod = PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'token' => $formData['stripeToken'], // Token obtained from Stripe.js or Elements
                ],
            ]);

            //creating customer in stripe
            $customer = Customer::create([
                'email' => auth()->guard('member')->user()->email,
                'name' => auth()->guard('member')->user()->name,
                'address' => [
                    'line1' => $formData['billing_address_line1'],
                    'line2' => $formData['billing_address_line2'],
                    'country' => $formData['billing_country'],
                    'state' => $formData['billing_state'],
                    'city' => $formData['billing_city'],
                    'postal_code' => $formData['billing_postalcode'],
                ],
                'phone' => $formData['billing_phone'],
                'payment_method' => $paymentMethod->id, // Default payment method (card) pm_card_visa
                'invoice_settings' => [
                    'default_payment_method' => $paymentMethod->id, // Default payment method (card) pm_card_visa
                ],
                'description' => 'Customer for ' . $package->title,
            ]);

            $paymentMethod->attach([
                'customer' => $customer->id,
            ]);


            //updating member column
            Member::where('id', auth()->guard('member')->user()->id)->update(['stripe_customer_id' => $customer->id]);


            // Create a subscription with the coupon code
            if ($formData['coupon_id']) {
                $subscriptionParams = [
                    'customer' => $customer->id,
                    'items' => [['price' => $package->stripe_price_id]], // Replace with your actual price ID
                    'coupon' => $formData['coupon_id'], // Use the retrieved coupon ID
                ];
            } else {
                $subscriptionParams = [
                    'customer' => $customer->id,
                    'items' => [['price' => $package->stripe_price_id]], // Replace with your actual price ID
                ];
            }

            //creating stripe subscription
            $subscription = Subscription::create($subscriptionParams);
            $stripe_subscription_id = $subscription->id;
            $currentPeriodStart = date('Y-m-d', $subscription->current_period_start);
            $currentPeriodEnd = date('Y-m-d', $subscription->current_period_end);

            $subscriptionModel = new Subscriptions;
            $subscriptionModel->member_id = auth()->guard('member')->user()->id;
            $subscriptionModel->package_id = $formData['package_id'];
            $subscriptionModel->stripe_subscription_id = $stripe_subscription_id;
            $subscriptionModel->subscription_start_date = $currentPeriodStart;
            $subscriptionModel->subscription_expire_date = $currentPeriodEnd;
            $subscriptionModel->billing_name = auth()->guard('member')->user()->name;
            $subscriptionModel->billing_email = auth()->guard('member')->user()->email;
            $subscriptionModel->billing_address = $formData['billing_address_line1'] . ' ' . $formData['billing_address_line2'];
            $subscriptionModel->billing_state = $formData['billing_state'];
            $subscriptionModel->billing_city = $formData['billing_city'];
            $subscriptionModel->billing_zipcode = $formData['billing_postalcode'];
            $subscriptionModel->auto_renew = 1;
            $subscriptionModel->status = 1;
            $subscriptionModel->save();

            // Update member type
            Member::where('id', $subscriptionModel->member_id)->update(['type' => 3]);

            //for invoice
            // Retrieve the invoice for the subscription
            $invoice = Invoice::retrieve($subscription->latest_invoice);

            // Save invoice data in your database

            //webhook saving this credentials as well it is creating duplicates

            // PaymentHistory::create([
            //     'user_id' => auth()->guard('member')->user()->id,
            //     'payment_type' => 'Subscription Payment',
            //     'stripe_transaction_id' => $invoice->id,
            //     'stripe_amount' => number_format($invoice->amount_due / 100, 2, '.', ''),
            //     'stripe_status' => $invoice->status,
            //     'stripe_description' => $invoice->description,
            //     'stripe_payment_method' => $invoice->payment_intent,
            //     'stripe_receipt_url' => $invoice->hosted_invoice_url,
            //     'status' => $invoice->status === "paid" ? '1' : '0',
            // ]);

            // Commit the transaction
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Subscription Activated Successfully',
            ], 200);

        } catch (QueryException $e) {
            // Something went wrong, rollback the transaction
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Failed to activate subscription. Please try again.',
            ], 401);
        }
    }

    public function cancelSubscription()
    {
        try {
            $getSubscriptionId = Subscriptions::where('member_id',auth()->guard('member')->user()->id)->latest()->first();
            $subscriptionId = $getSubscriptionId->stripe_subscription_id;
            // Retrieve the subscription from Stripe
            $subscription = Subscription::retrieve($subscriptionId);

            // Cancel the subscription
            $subscription->cancel();

            $getSubscriptionId->status = 0;
            $getSubscriptionId->save();

            $user = Member::where('id',auth()->guard('member')->user()->id)->update(['type'=>1]);
            $notification = [
                'message' => 'Subscription Canceled Successfully',
                'alert-type' => 'error'
            ];

            return back()->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'Failed to cancel subscription: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    public function getCustomerInvoices()
    {
        $customerId = auth()->guard('member')->user()->customer_id; // Example customer ID

        // List all invoices for the customer
        $invoices = Invoice::all([
            'customer' => $customerId,
            // 'limit' => 10, // Optional: Limit the number of invoices to retrieve
        ]);
        dd($invoices);
    }
}
