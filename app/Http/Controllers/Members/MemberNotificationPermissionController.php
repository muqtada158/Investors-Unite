<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\NotificationPermissions;
use Illuminate\Http\Request;

class MemberNotificationPermissionController extends Controller
{
    public function validate_member()
    {
        $member = NotificationPermissions::where('member_id',auth()->guard('member')->user()->id)->first();
        if($member)
        {
            if(
                $member->notify_deal_posted == 0 AND
                $member->notify_offer_received == 0 AND
                $member->notify_buy_now == 0 AND
                $member->notify_jv_partner == 0 AND
                $member->notify_direct_message == 0 AND
                $member->notify_closing_date == 0 AND
                $member->notify_financing == 0 AND
                $member->notify_house_tour == 0 AND
                $member->notify_price_reduction == 0
            )
            {
                return response()->json(['status'=>2,'message'=>'No permission granted.']);
            }
            else
            {
                return response()->json(['status'=>1,'message'=>'Permission granted already.']);
            }
        }
        else
        {
            $store_member = new NotificationPermissions;
            $store_member->member_id = auth()->guard('member')->user()->id;
            $store_member->save();
            return response()->json(['status'=>0,'message'=>'Member registered in permissions.']);
        }
    }

    public function store_permission(Request $request)
    {
        $myKey = $request->myKey;
        $myValue = $request->myValue;
        $permission = NotificationPermissions::where('member_id',auth()->guard('member')->user()->id)->update([$myKey => $myValue]);

        return response()->json(['status' => 1, 'message' => 'Successfully updated'],200);
    }

    public function subscription_status()
    {
        $member = auth()->guard('member')->user()->id;
        $getStatus = NotificationPermissions::where('member_id',$member)->first();
        if(isset($getStatus))
        {
            if($getStatus->status === "1")
            {
                $notificationStatus = NotificationPermissions::where('member_id', $member)->update([
                    // 'notify_deal_posted' => 0,
                    // 'notify_offer_received' => 0,
                    // 'notify_buy_now' => 0,
                    // 'notify_jv_partner' => 0,
                    // 'notify_direct_message' => 0,
                    // 'notify_closing_date' => 0,
                    // 'notify_financing' => 0,
                    // 'notify_house_tour' => 0,
                    // 'notify_price_reduction' => 0,
                    'status' => 0
                ]);
                return response()->json(['status'=> 0,'message'=> 'UnSubscribed Successfully'],200);
            }
            else
            {
                $notificationStatus = NotificationPermissions::where('member_id', $member)->update([
                    'status'=> 1
                ]);
                return response()->json(['status'=>1,'message'=> 'Subscribed Successfully'],200);
            }
        }
        else
        {
            $notificationStatus = NotificationPermissions::create([
                'member_id' => $member,
                'status' => 1
            ]);
            return response()->json(['status'=>1,'message'=> 'Subscribed Successfully'],200);
        }
    }
}
