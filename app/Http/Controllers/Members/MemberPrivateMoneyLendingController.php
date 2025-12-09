<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\MoneyLenderPayment;
use App\Models\oneTimePayment;
use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class MemberPrivateMoneyLendingController extends Controller
{
    public function find_funding_today()
    {
        $getMember = oneTimePayment::where('member_id',auth()->user()->id)->where('status',1)->first();
        return view('members.private-money-lenders',compact('getMember'));
    }

    public function one_time_payment()
    {
        $checkUser = oneTimePayment::where('member_id',auth()->guard('member')->user()->id)->where('status',1)->first();
        if($checkUser)
        {
            $notification = [
                'message' => 'You dont have access to this page, you have already paid this one time payment',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
        $oneTimePayment = MoneyLenderPayment::findorfail(1);
        return view('members.one-time-payment',compact('oneTimePayment'));
    }

    public function process_one_time_payment_ajax(Request $request)
    {
        $payment = MoneyLenderPayment::where('id',1)->first();
        $payment_in_cents = $payment->one_time_payment * 100;

        Stripe::setApiKey(config('app.STRIPE_SECRET_KEY'));
        try {
            $charge = Charge::create([
                'amount' => $payment_in_cents,
                'currency' => 'usd',
                'description' => 'Investor unite (ONE TIME FEE)',
                'source' => $request->input('stripeToken'),
            ]);

            //updating data in onetimepayment table
            oneTimePayment::create(['member_id'=>auth()->guard('member')->user()->id, 'status'=> '1']);

            //saving data in payment histories table
            PaymentHistory::create([
                'user_id'=>auth()->guard('member')->user()->id,
                'payment_type'=>'One Time Payment(Access to money lenders)',
                'stripe_transaction_id'=>$charge['id'],
                'stripe_amount'=>number_format($charge['amount'] / 100, 2, '.', ''),
                'stripe_status'=>$charge['status'],
                'stripe_description'=>$charge['description'],
                'stripe_payment_method'=>$charge['payment_method'],
                'stripe_receipt_url'=>$charge['receipt_url'],
                'status'=>$charge['status'] === "succeeded" ? '1' : 0,
            ]);

            return response()->json(['message' => 'Payment successful', 'charge' => $charge]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
