<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\PaymentHistory;
use App\Models\Subscriptions;
use App\Models\WebhookLogs;
use Exception;
use Illuminate\Http\Request;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Invoice;
use Stripe\Stripe;
use Stripe\Subscription;
use Stripe\Webhook;

class WebhookController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('app.STRIPE_SECRET_KEY'));
    }
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('app.STRIPE_WEBHOOK_SECRET'); // Set your webhook secret key

        try {
            $event = Webhook::constructEvent(
                $payload, $sigHeader, $endpointSecret
            );
        } catch (SignatureVerificationException $e) {
            return response('Webhook Signature Verification Failed.', 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
                $this->handleCheckoutSessionCompleted($event->data->object, $event->type);
                break;
            case 'customer.subscription.updated':
                $this->handleSubscriptionUpdated($event->data->object, $event->type);
                break;
            case 'subscription_schedule.canceled':
                $this->handleSubscriptionScheduleCanceled($event->data->object, $event->type);
                break;
            case 'invoice.upcoming':
                $this->handleInvoiceUpcoming($event->data->object, $event->type);
                break;
            case 'charge.captured':
                $this->handleChargeCaptured($event->data->object, $event->type);
                break;
            case 'invoice.payment_succeeded':
                $this->handleInvoicePaymentSucceeded($event->data->object, $event->type);
                break;
            case 'invoice.payment_failed':
                $this->handleInvoicePaymentFailed($event->data->object, $event->type);
                break;
            default:
                return response('Received unknown event type ' . $event->type);
                break;
        }

        return response('Webhook Handled Success here from Investor Unite.', 200);
    }

    protected function handleCheckoutSessionCompleted($data,$type)
    {
        //collecting data and making logs for each webhooks
        $this->saveWebhookLogs($data,$type);
    }

    protected function handleSubscriptionUpdated($data,$type)
    {
        //collecting data and making logs for each webhooks
        $this->saveWebhookLogs($data,$type);
    }

    protected function handleSubscriptionScheduleCanceled($data,$type)
    {
        //collecting data and making logs for each webhooks
        $this->saveWebhookLogs($data,$type);

        //making customer unpaid user
        $customer_email = $data->customer_email;

        // Update your database to mark the subscription as unpaid or payment failed
        $user = Member::where('email', $customer_email)->first();
        if ($user) {
            // Update user status or take appropriate actions
            $user->update(['type' => 1]);
            // cancel subscription
            $getSubscriptionId = Subscriptions::where('member_id',$user->id)->latest()->first();
            $subscriptionId = $getSubscriptionId->stripe_subscription_id;
            // Retrieve the subscription from Stripe
            $subscription = Subscription::retrieve($subscriptionId);

            // Cancel the subscription
            $subscription->cancel();

            $getSubscriptionId->status = 0;
            $getSubscriptionId->save();
        }

    }

    protected function handleInvoiceUpcoming($data,$type)
    {
        //collecting data and making logs for each webhooks
        $this->saveWebhookLogs($data,$type);
    }

    protected function handleChargeCaptured($data,$type)
    {
        //collecting data and making logs for each webhooks
        $this->saveWebhookLogs($data,$type);
    }

    protected function handleInvoicePaymentSucceeded($data, $type)
    {
        //collecting data and making logs for each webhooks
        $log = $this->saveWebhookLogs($data,$type);

        //saving payment invoice data
        $this->saveSubscriptionInvoice($data, $log);
    }

    protected function handleInvoicePaymentFailed($data, $type)
    {
        //collecting data and making logs for each webhooks
        $log = $this->saveWebhookLogs($data,$type);

        //making customer unpaid user
            $customer_email = $data->customer_email;

            // Update your database to mark the subscription as unpaid or payment failed
            $user = Member::where('email', $customer_email)->first();
            if ($user) {
                // Update user status or take appropriate actions
                $user->update(['type' => 1]);
                // cancel subscription
                $getSubscriptionId = Subscriptions::where('member_id',$user->id)->latest()->first();
                $subscriptionId = $getSubscriptionId->stripe_subscription_id;
                // Retrieve the subscription from Stripe
                $subscription = Subscription::retrieve($subscriptionId);

                // Cancel the subscription
                $subscription->cancel();

                $getSubscriptionId->status = 0;
                $getSubscriptionId->save();
            }

    }

    public function saveWebhookLogs($data, $type)
    {
        $webhookLog = new WebhookLogs();

        $webhookLog->user_id = Member::where('email', $data->customer_email)->first()->id ?? null;
        $webhookLog->stripe_customer = $data->customer;
        $webhookLog->stripe_customer_email = $data->customer_email;
        $webhookLog->stripe_invoice = $data->id ?? null;
        $webhookLog->stripe_billing_reason = $data->billing_reason ?? null;
        $webhookLog->stripe_hosted_invoice_url = $data->hosted_invoice_url;
        $webhookLog->stripe_invoice_pdf = $data->invoice_pdf;
        $webhookLog->stripe_event = $type;
        $webhookLog->stripe_complete_object = json_encode($data);

        $webhookLog->save();
        return $webhookLog;
    }

    public function saveSubscriptionInvoice($data, $webhookLog)
    {
        // Retrieve the invoice for the subscription
        $invoice = Invoice::retrieve($data->id);

        // Save invoice data in your database
        $payment_history = PaymentHistory::create([
            'user_id' => $webhookLog->user_id,
            'payment_type' => 'Subscription Payment',
            'stripe_transaction_id' => $invoice->id,
            'stripe_amount' => number_format($invoice->amount_due / 100, 2, '.', ''),
            'stripe_status' => $invoice->status,
            'stripe_description' => $invoice->description,
            'stripe_payment_method' => $invoice->payment_intent,
            'stripe_receipt_url' => $invoice->hosted_invoice_url,
            'status' => $invoice->status === "paid" ? '1' : '0',
        ]);

        return $payment_history;
    }
}
