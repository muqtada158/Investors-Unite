<?php

use App\Models\SavedDeal;
use Stripe\Coupon;
use Stripe\Stripe;

function check_saved_deals($property_id)
{
    if(auth()->guard('member')->check()){

        $member_id = auth()->guard('member')->user()->id;
        $property_deals = SavedDeal::where('property_id', $property_id)->where('member_id',$member_id)->first();
        if($property_deals)
        {
            $image_url = asset('user/images/save-img-hover.png');
            return $image_url;
        }
        else{
            $image_url = asset('user/images/save-img.png');
            return $image_url;
        }
    }
    else{
        $image_url = asset('user/images/save-img.png');
        return $image_url;
    }
}

function check_saved_deals_index($property_id)
{
    if(auth()->guard('member')->check()){

        $member_id = auth()->guard('member')->user()->id;
        $property_deals = SavedDeal::where('property_id', $property_id)->where('member_id',$member_id)->first();
        if($property_deals)
        {
            $image_url = asset('user/images/bookmark1.png');
            return $image_url;
        }
        else{
            $image_url = asset('user/images/bookmark.png');
            return $image_url;
        }
    }
    else{
        $image_url = asset('user/images/bookmark.png');
        return $image_url;
    }
}

function getCouponRedeemedCount()
{
    Stripe::setApiKey(config('app.STRIPE_SECRET_KEY'));
    $coupon = Coupon::retrieve('vzRqM9WS');
    return $coupon->max_redemptions - $coupon->times_redeemed;
}
