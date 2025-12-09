<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Jobs\emailNotificationsJob;
use App\Jobs\pushNotificationsJob;
use App\Models\Property;
use App\Models\Showings;
use App\Traits\emailNotifications;
use App\Traits\pushNotifications;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberShowingController extends Controller
{
    use emailNotifications, pushNotifications;

    public function store_showing(Request $request)
    {
        //authenticating the user end
        $userCheck = Property::where('id', $request->property_id)->where('member_id', auth()->guard('member')->user()->id)->first();
        if ($userCheck) {
            $notification = [
                'message' => 'This is your listing, You cannot schedule a meeting.',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
        //authenticating the user end


        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
        ]);

        $showing = new Showings;
        $showing->buyer_id = auth()->guard('member')->user()->id;
        $showing->lister_id = $request->lister_id;
        $showing->property_id = $request->property_id;
        $showing->date = $request->date;
        $showing->time = $request->time;
        $showing->status = 0;
        $showing->save();

        //sending email to dealer via queu jobs starts
        emailNotificationsJob::dispatch([$showing->getBuyer->email],$showing,'showingsDealer');
        //sending email to dealer via queu jobs ends

        //sending notifications via queu jobs starts
        $members = [$showing->getLister->id];
        $title = 'Investor Unite';
        $body = 'You got a house tour request on your property ('.$showing->getProperty->complete_address.')';
        $image = asset($showing->getProperty->getImages[0]->image);
        $type = 'notify_house_tour';
        $url = route('dashboard.showingDetail', [$showing->id]);
        pushNotificationsJob::dispatch($members, $body, $image, $type, $url);
        //sending notifications via queu jobs ends

        $notification = [
            'message' => 'Showing scheduled successfully.',
            'alert-type' => 'success'
        ];

        return back()->with($notification);
    }

    public function listing_showing(Request $request)
    {
        if ($request->ajax()) {

            $data = Showings::with('getBuyer','getProperty')->where('lister_id',auth()->guard('member')->user()->id);

            return DataTables::eloquent($data)
                // adding index or s.no
                ->addIndexColumn()
                ->editColumn('user', function ($data) {
                    return $data->getBuyer->name;
                })
                ->editColumn('complete_address', function ($data) {
                    return $data->getProperty->complete_address;
                })
                ->editColumn('date', function ($data) {
                    return $data->date;
                })
                ->editColumn('time', function ($data) {
                    return $data->time;
                })
                ->editColumn('status', function ($data) {
                    if($data->status == 0)
                    {
                        return '<span class="badge rounded-pill bg-primary">Pending</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill bg-primary text-dark">Scheduled</span>';
                    }
                })
                ->filterColumn('status', function ($data, $keyword) {
                    $data->whereRaw("IF(status = 0, 'Pending', 'Scheduled') like ?", ["%{$keyword}%"]);
                })
                ->editColumn('action', function ($data) {
                    $btn = '<a href="'.route('dashboard.showingDetail',[$data->id]).'" class="edit btn btn-primary btn-sm" title="Schedule"><i class="fa-regular fa fa-eye"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('members.dashboard.showings-listing');
    }

    public function confirmShowingData(Showings $showings, Request $request)
    {
        $showings->date = $request->date;
        $showings->time = $request->time;
        $showings->status = 1;
        $showings->save();

        //sending email to buyer starts
        emailNotificationsJob::dispatch([$showings->getBuyer->email],$showings,'showingsBuyer');
        //sending email to buyer ends

        //sending notifications starts
        $members = [$showings->getBuyer->id];
        $title = 'Investor Unite';
        $body = 'Your request for house tour ('.$showings->getProperty->complete_address.') has been confirmed. Date : '.$showings->date.' Time : '.$showings->time;
        $image = asset($showings->getProperty->getImages[0]->image);
        $type = 'notify_house_tour';
        $url = null;
        pushNotificationsJob::dispatch($members, $body, $image, $type, $url);
        //sending notifications ends

        $notification = [
            'message' => 'Showing Scheduled Successfully',
            'alert-type' => 'success'
        ];

        return back()->with($notification);
    }

    public function showingDetail($id)
    {
        $showings = Showings::with('getBuyer','getProperty')->where('id',$id)->first();
        return view('members.dashboard.showings-detail',compact('showings'));
    }

    public function sendToAllNotification()
    {
        try {
            $members = null;
            $title = 'Investor Unite';
            $body = 'ThankYou for joining investors unite, stay connected and get exciting offers.';
            $image = null;
            $type = 'sendToAll';
            $url = null;
            pushNotificationsJob::dispatch($members, $body, $image, $type, $url);
            return "send successfully";
        } catch (\Exception $e) {
            return "error ".$e;
        }
    }
}
