<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Faq;
use App\Models\Member;
use App\Models\MoneyLenderPayment;
use App\Models\oneTimePayment;
use App\Models\PaymentHistory;
use App\Models\Property;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clear_caches()
    {
        try {
            Artisan::call('optimize');

            return 'Optimization successful';
        } catch (Exception $e) {
            return 'Optimization failed <br>'. $e;
        }
    }

    public function index()
    {
        $buyers = Member::where('type',1)->get()->count();
        $dealers = Member::where('type',3)->get()->count();
        return view('admin.index',compact('buyers','dealers'));
    }

    public function users(Request $request)
    {
        if ($request->ajax()) {
            $data = Member::query();

            if(isset($request->type)) {
                    $data->where('type',$request->type);
            }

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()

                ->editColumn('type', function ($data) {
                    if($data->type == 1)
                    {
                        return empty($data->type) ? '' : 'Buyer';
                    }
                    elseif($data->type == 2)
                    {
                        return empty($data->type) ? '' : 'Seller';
                    }
                    elseif($data->type == 3)
                    {
                        return empty($data->type) ? '' : 'Property-Dealer';
                    }
                    else{
                        return empty($data->type) ? '' : 'Money Lender';
                    }
                })
                ->editColumn('status', function ($data) {
                    if($data->status == 1)
                    {
                        return '<span class="badge bg-primary">Active</span>';
                    }
                    else
                    {
                        return '<span class="badge bg-dark">InActive</span>';
                    }
                })

                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="'.route('admin.view_user',[$data->id]).'" class="edit btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></i></a>';
                    // $btn1 = '<a href="' . route('dashboard.property_detail_edit',[$data->id]) . '" class="edit btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></i></a>
                    // <a id="delete" class="btn btn-danger btn-sm" href="' . route('dashboard.delete_property',[$data->id]) . '"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('admin.users');
    }


    public function view_user(Member $member)
    {
        return view('admin.user-detail',compact('member'));
    }

    public function edit_user(Member $member, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email_for_notification' => 'required',
            'phone' => 'required',
            'phone_for_notification' => 'required',
            'company' => 'required',
        ]);

        $member->name = $request->name;
        $member->email_for_notification = $request->email_for_notification;
        $member->phone = $request->phone;
        $member->phone_for_notification = $request->phone_for_notification;
        $member->company = $request->company;
        $member->status = $request->status == null ? 0 : 1;
        $member->save();

        $notification = [
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.users')->with($notification);
    }

    public function properties(Request $request)
    {
        if ($request->ajax()) {
            // using eloquent model don't use get()
            $data = Property::query();

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('price', function ($data) {
                    return empty($data->price) ? '' : '$ '.$data->price;
                })
                ->editColumn('created_at', function ($data) {
                    return empty($data->created_at) ? '' : Carbon::parse($data->created_at)->diffForHumans();
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="'.route('property_detail',[$data->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i></i></a>';
                    // $btn1 = '<a href="' . route('dashboard.property_detail_edit',[$data->id]) . '" class="edit btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></i></a>
                    // <a id="delete" class="btn btn-danger btn-sm" href="' . route('dashboard.delete_property',[$data->id]) . '"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.property-list');
    }

    public function one_time_payment_listing(Request $request)
    {
        if ($request->ajax()) {
            // using eloquent model don't use get()
            $data = PaymentHistory::with('getMember')->where('payment_type','One Time Payment(Access to money lenders)')->orderby('id','DESC');

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('stripe_amount', function ($data) {
                    return empty($data->stripe_amount) ? '' : '$ '.$data->stripe_amount;
                })
                ->filterColumn('stripe_amount', function ($data, $keyword) {
                    $data->where('stripe_amount', 'like', "%$keyword%");
                })
                ->editColumn('getMember.name', function ($data) {
                    return '<a href="'.route('admin.view_user',[$data->getMember->id]).'" class="btn btn-dark btn-sm">'.$data->getMember->name.'</a>';
                })
                ->editColumn('getMember.email', function ($data) {
                    return $data->getMember->email;
                })
                ->editColumn('created_at', function ($data) {
                    return empty($data->created_at) ? '' : Carbon::parse($data->created_at)->diffForHumans();
                })
                ->editColumn('status', function ($data) {
                    if($data->status == 1)
                    {
                        return '<span class="badge bg-primary">Paid</span>';
                    }
                    else
                    {
                        return '<span class="badge bg-dark">Pending</span>';
                    }
                })
                ->filterColumn('status', function ($query, $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('status', 1)
                            ->whereRaw("CONVERT('Paid' USING utf8mb4) LIKE ?", ["%{$keyword}%"]);
                    })->orWhere(function ($query) use ($keyword) {
                        $query->where('status', 0)
                            ->whereRaw("CONVERT('Pending' USING utf8mb4) LIKE ?", ["%{$keyword}%"]);
                    });
                })
                ->addColumn('action', function ($data) {
                    $btn = '<a href="'.route('admin.one_time_payment_detail',[$data->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','getMember.name','status'])
                ->make(true);
        }

        $getMoneyLenderPayment = MoneyLenderPayment::where('id',1)->first();
        return view('admin.one-time-payments',compact('getMoneyLenderPayment'));
    }

    public function one_time_payment_detail($id)
    {
        $payment = PaymentHistory::with('getMember')->where('id',$id)->first();
        if($payment == null)
        {
            abort(404);
        }
        return view('admin.one-time-payments-detail',compact('payment'));
    }

    public function update_onetime_payment(Request $request)
    {

        $this->validate($request, [
            'one_time_payment' => 'required | numeric',
        ]);

        $payment = MoneyLenderPayment::where('id','1')->update([
            'one_time_payment'=> $request->one_time_payment
        ]);


        if($payment)
        {
            $notification = [
                'message' => 'Payment Updated Successfully',
                'alert-type' => 'success'
            ];
        }else{
            $notification = [
                'message' => 'Failed, Something went wrong...',
                'alert-type' => 'success'
            ];
        }

        return back()->with($notification);
    }

    public function subscription_payment_listing(Request $request)
    {
        if ($request->ajax()) {
            // using eloquent model don't use get()
            $data = PaymentHistory::with('getMember')->where('payment_type','Subscription Payment')->orderby('id','DESC');

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('stripe_amount', function ($data) {
                    return empty($data->stripe_amount) ? '' : '$ '.$data->stripe_amount;
                })
                ->filterColumn('stripe_amount', function ($data, $keyword) {
                    $data->where('stripe_amount', 'like', "%$keyword%");
                })
                ->editColumn('getMember.name', function ($data) {
                    return '<a href="'.route('admin.view_user',[$data->getMember->id]).'" class="btn btn-dark btn-sm">'.$data->getMember->name.'</a>';
                })
                ->editColumn('getMember.email', function ($data) {
                    return $data->getMember->email;
                })
                ->editColumn('created_at', function ($data) {
                    return empty($data->created_at) ? '' : Carbon::parse($data->created_at)->diffForHumans();
                })
                ->editColumn('status', function ($data) {
                    if($data->status == 1)
                    {
                        return '<span class="badge bg-primary">Paid</span>';
                    }
                    else
                    {
                        return '<span class="badge bg-dark">Pending</span>';
                    }
                })
                ->filterColumn('status', function ($query, $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('status', 1)
                            ->whereRaw("CONVERT('Paid' USING utf8mb4) LIKE ?", ["%{$keyword}%"]);
                    })->orWhere(function ($query) use ($keyword) {
                        $query->where('status', 0)
                            ->whereRaw("CONVERT('Pending' USING utf8mb4) LIKE ?", ["%{$keyword}%"]);
                    });
                })
                ->addColumn('action', function ($data) {
                    $btn = '<a href="'.route('admin.subscription_payment_detail',[$data->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','getMember.name','status'])
                ->make(true);
        }

        $getMoneyLenderPayment = MoneyLenderPayment::where('id',1)->first();
        return view('admin.subscription-payments',compact('getMoneyLenderPayment'));
    }

    public function subscription_payment_detail($id)
    {
        $payment = PaymentHistory::with('getMember')->where('id',$id)->first();
        if($payment == null)
        {
            abort(404);
        }
        return view('admin.subscription-payment-details',compact('payment'));
    }

    public function contactus(Request $request)
    {
        if ($request->ajax()) {
            // using eloquent model don't use get()
            $data = Contact::orderby('id','DESC');

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('name', function ($data) {
                    return empty($data->name) ? '' : $data->name;
                })
                ->editColumn('email', function ($data) {
                    return empty($data->email) ? '' : $data->email;
                })
                ->editColumn('phone', function ($data) {
                    return empty($data->phone) ? '' : $data->phone;
                })
                ->editColumn('message', function ($data) {
                    return empty($data->message) ? '' : $data->message;
                })
                ->editColumn('created_at', function ($data) {
                    return empty($data->created_at) ? '' : Carbon::parse($data->created_at)->diffForHumans();
                })
                ->addColumn('action', function ($data) {
                    $btn = '<a href="'.route('admin.contact_us_details',[$data->id]).'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i></i></a>
                    <a id="delete" class="btn btn-primary btn-sm" href="' . route('admin.contact_us_details_delete',[$data->id]) . '"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.contact-us');
    }



    public function contact_us_details($id)
    {
        $contact = Contact::where('id',$id)->first();
        return view('admin.contact-us-detail',compact('contact'));
    }

    public function contact_us_details_delete($id)
    {
        $contact = Contact::where('id',$id)->delete();
        $notification = [
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }

}
