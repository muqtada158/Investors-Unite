<?php

namespace App\Traits;
use Mail;
use App\Mail\BuyNow;
use App\Mail\Contact;
use App\Mail\DealPosted;
use App\Mail\JvPartnerRequest;
use App\Mail\MakeAnOffer;
use App\Mail\PropertyShowingBuyer;
use App\Mail\PropertyShowingDealer;

trait emailNotifications
{
    public function dealPosted($sendTo, $mailData)
    {
        Mail::to([$sendTo,'mdmuqtada.twg@gmail.com'])->send(new DealPosted($mailData));
    }

    public function buyNow($sendTo, $mailData)
    {
        Mail::to([$sendTo,'mdmuqtada.twg@gmail.com'])->send(new BuyNow($mailData));
    }

    public function makeAnOffer($sendTo, $mailData)
    {
        Mail::to([$sendTo,'mdmuqtada.twg@gmail.com'])->send(new MakeAnOffer($mailData));
    }

    public function jvPartnerRequest($sendTo, $mailData)
    {
        Mail::to([$sendTo,'mdmuqtada.twg@gmail.com'])->send(new JvPartnerRequest($mailData));
    }

    public function showingsDealer($sendTo, $mailData)
    {
        Mail::to([$sendTo,'mdmuqtada.twg@gmail.com'])->send(new PropertyShowingDealer($mailData));

    }

    public function showingsBuyer($sendTo, $mailData)
    {
        Mail::to([$sendTo,'mdmuqtada.twg@gmail.com'])->send(new PropertyShowingBuyer($mailData));
    }
    public function contact($sendTo, $mailData)
    {
        Mail::to([$sendTo,'mdmuqtada.twg@gmail.com'])->send(new Contact($mailData));
    }
}
