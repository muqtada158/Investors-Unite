<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Member;
use App\Models\NotificationPermissions;
use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class MemberMyAccountController extends Controller
{
    public function support()
    {
        $faqs = Faq::where('status','1')->orderby('id','ASC')->get();
        return view('members.my-account.support',compact('faqs'));
    }

    public function card_details()
    {
        return view('members.my-account.card-details');
    }

    public function direct_message()
    {
        return view('members.my-account.direct-message');
    }

    public function my_profile()
    {
        $member = Member::where('id',auth()->guard('member')->user()->id)->first();
        return view('members.my-account.my-profile',compact('member'));
    }

    public function my_profile_edit(Request $request)
    {
        $check_image = Member::where('id',auth()->guard('member')->user()->id)->first();
        if($check_image->image === null)
        {
            $this->validate($request, [
                'name' => 'required|string',
                'email_for_notification' => 'required|email',
                'phone' => 'required|string',
                'phone_for_notification' => 'required|string',
                'company' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'current_password' => 'nullable',
                'new_password' => 'required_with:current_password',
                'password_confirmation' => 'required_with:current_password|same:new_password'
            ]);
        }else{
            $this->validate($request, [
                'name' => 'required|string',
                'email_for_notification' => 'required|email',
                'phone' => 'required|string',
                'phone_for_notification' => 'required|string',
                'company' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'current_password' => 'nullable',
                'new_password' => 'required_with:current_password',
                'password_confirmation' => 'required_with:current_password|same:new_password'
            ]);
        }

        $member = Member::where('id',auth()->guard('member')->user()->id)->first();
        $member->name = $request->name;
        $member->email_for_notification = $request->email_for_notification;
        $member->phone = $request->phone;
        $member->phone_for_notification = $request->phone_for_notification;
        $member->company = $request->company;
        $member->profile_status = 1;
        if($request->hasFile('image'))
		{
		        /**delete old image*/
		        if(File::exists(public_path($member->image))){
                    File::delete(public_path($member->image));
                }

                /**upload new image*/
				$upload_location = '/upload/profile/';
                $file = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                $file->move(public_path().$upload_location,$name_gen);
                $save_url = $upload_location.$name_gen;

                $member->image = $save_url;
        }
        $member->save();

        //for update password
        if($request->current_password)
            {
                if (Hash::check($request->current_password, $member->password)) {
                    $member->password = Hash::make($request->new_password);
                } else {
                    $notification = [
                        'message' => 'Your current password is invalid',
                        'alert-type' => 'error'
                    ];
                    return back()->with($notification);
                }
                $member->save();
            }

        $notification = [
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        ];
        return back()->with($notification);

    }

    public function subscriptions()
    {
        return view('members.my-account.subscriptions');
    }


    public function notifications()
    {
        $getPermissions = NotificationPermissions::where('member_id',auth()->guard('member')->user()->id)->first();
        if($getPermissions === null)
        {
            $getPermissions = null;
        }
        return view('members.my-account.notifications',compact('getPermissions'));
    }

    public function payment_history(Request $request)
    {
        if ($request->ajax()) {
            $data = PaymentHistory::where('user_id',auth()->guard('member')->user()->id)->orderby('id','DESC');

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('amount', function ($data) {
                    return '$ '.$data->stripe_amount;
                })
                ->editColumn('status', function ($data) {
                    if($data->status == 0)
                    {
                        return '<span class="badge rounded-pill bg-dark">Pending</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill bg-primary">Paid</span>';
                    }
                })
                ->addColumn('stripe_receipt_url', function ($data) {
                    $btn = '<a href="'.$data->stripe_receipt_url.'" target="__blank" class="edit btn btn-primary btn-sm" title="Edit Properties"><i class="fa-regular fa-pen-to-square"></i>Receipt</i></a>';
                    return $btn;
                })
                ->editColumn('created_at', function ($data) {
                    $setdate = $data->created_at->format('Y/m/d') .' | '.$data->created_at->diffForHumans();
                    return $setdate;
                })
                ->rawColumns(['stripe_receipt_url','status'])
                ->make(true);
        }
        return view('members.my-account.payment-history');
    }
}
