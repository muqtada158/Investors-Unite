<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Jobs\emailNotificationsJob;
use App\Jobs\pushNotificationsJob;
use App\Models\JVPartner;
use App\Models\Member;
use App\Models\Offer;
use App\Models\PropertiesImage;
use App\Models\Property;
use App\Models\PropertyBuyers;
use App\Models\PropertySold;
use App\Models\SavedDeal;
use App\Traits\emailNotifications;
use App\Traits\pushNotifications;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class MemberDashboardController extends Controller
{
    use emailNotifications, pushNotifications;

    public function index()
    {
        $deal_posted = 0;
        $property_sold = 0;
        $property_bought = 0;

        if(auth()->check())
        {
            $user_id = auth()->user()->id;
            $deal_posted = Property::where('member_id',$user_id)->count();
            $property_sold = PropertySold::where('lister_id',$user_id)->count();
            $property_bought = PropertySold::where('buyer_id',$user_id)->count();
        }

        return view('members.dashboard.index',compact('deal_posted','property_sold','property_bought'));
    }

    public function buyers(Request $request)
    {
        if ($request->ajax()) {
            $data = PropertySold::where('lister_id',auth()->guard('member')->user()->id);

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->getBuyer->name;
                })
                ->filterColumn('name', function ($data, $keyword) {
                    $data->whereHas('getBuyer', function ($query) use ($keyword) {
                        $query->where('name', 'like', "%$keyword%");
                    });
                })
                ->addColumn('email', function ($data) {
                    return $data->getBuyer->email;
                })
                ->filterColumn('email', function ($data, $keyword) {
                    $data->whereHas('getBuyer', function ($data) use ($keyword) {
                        $data->where('email', 'like', "%$keyword%");
                    });
                })
                ->addColumn('phone', function ($data) {
                    return $data->getBuyer->phone;
                })
                ->filterColumn('phone', function ($data, $keyword) {
                    $data->whereHas('getBuyer', function ($data) use ($keyword) {
                        $data->where('phone', 'like', "%$keyword%");
                    });
                })
                ->addColumn('property_address', function ($data) {
                    return $data->getProperty->complete_address;
                })
                ->filterColumn('property_address', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('complete_address', 'like', "%$keyword%");
                    });
                })
                ->editColumn('buying_price', function ($data) {
                    return '$ '.$data->buying_price;
                })
                ->filterColumn('buying_price', function ($data, $keyword) {
                    $data->where('buying_price', 'like', "%$keyword%");
                })
                ->addColumn('bought_on', function ($data) {
                    return $data->created_at->format('d-m-Y');
                })
                ->filterColumn('bought_on', function ($data, $keyword) {
                    $data->whereRaw("DATE_FORMAT(created_at,'%d-%m-%Y') like ?", ["%$keyword%"]);
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="' . route('dashboard.buyers_detail', [$data->getProperty->id]) . '" class="edit btn btn-primary btn-sm" title="View Buyers"><i class="fa-regular fa-eye"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('members.dashboard.buyers');
    }

    public function buyers_detail(Member $member)
    {
        return view('members.dashboard.buyers-detail',compact('member'));
    }

    public function property_listing(Request $request)
    {
        if ($request->ajax()) {
            $data = Property::where('member_id',auth()->guard('member')->user()->id);

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('price', function ($data) {
                    return '$ '.$data->price;
                })
                ->editColumn('property_status', function ($data) {
                    if($data->property_sold == 0)
                    {
                        return '<span class="badge rounded-pill bg-primary">Listed</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill bg-dark">Sold</span>';
                    }
                })
                ->filterColumn('property_status', function ($query, $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('property_sold', 0)
                            ->whereRaw("CONVERT('Listing' USING utf8mb4) LIKE ?", ["%{$keyword}%"]);
                    })->orWhere(function ($query) use ($keyword) {
                        $query->where('property_sold', 1)
                            ->whereRaw("CONVERT('Sold' USING utf8mb4) LIKE ?", ["%{$keyword}%"]);
                    });
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="' . route('dashboard.property_detail_edit',[$data->id]) . '" class="edit btn btn-primary btn-sm" title="Edit Properties"><i class="fa-regular fa-pen-to-square"></i></i></a>
                    <a id="delete" class="btn btn-primary btn-sm" href="' . route('dashboard.delete_property',[$data->id]) . '" title="Delete Properties"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['property_status','action'])
                ->make(true);
        }
        return view('members.dashboard.property-list');
    }

    public function property_step_1()
    {
        return view('members.dashboard.property-step-1');
    }
    public function property_step_1_create_edit(Request $request)
    {
        $this->validate($request, [
            'property_type' => 'required',
        ]);
        $request->session()->put('property_detail.property_type', $request->property_type);
        return redirect()->route('dashboard.property_step_2');
    }

    public function property_step_2()
    {
        return view('members.dashboard.property-step-2');
    }
    public function property_step_2_create_edit(Request $request)
    {
        $this->validate($request, [
            'complete_address' => 'required',
        ]);
        $request->session()->put('property_detail.complete_address', $request->complete_address);
        $request->session()->put('property_detail.latitude', $request->latitude);
        $request->session()->put('property_detail.longitude', $request->longitude);
        $request->session()->put('property_detail.city', $request->city);
        $request->session()->put('property_detail.state', $request->state);
        $request->session()->put('property_detail.zipcode', $request->zipcode);
        return redirect()->route('dashboard.property_detail');
    }

    public function property_step_3()
    {
        return view('members.dashboard.property-step-3');
    }

    public function property_detail()
    {
        return view('members.dashboard.property-detail');
    }
    public function property_detail_edit(Property $property)
    {
        return view('members.dashboard.property-detail-edit',compact('property'));
    }
    public function property_detail_add_edit(Property $property, Request $request)
    {
        $create = 1;
        (isset($property->id) and $property->id > 0) ? $create = 0 : $create = 1;

        $this->validate($request, [
            'price' => 'required',
            'after_repair_value' => 'required',
            'deal_type' => 'required',
            'no_of_beds' => 'required|integer',
            'no_of_baths' => 'required|integer',
            'acceptable_financing' => 'required|array',
            'total_square_footage' => 'required|string',
            'association_community' => 'required',
            'current_zoning' => 'required|string',
            'annual_taxes' => 'required',
            'year_built' => 'required|date_format:Y',
            'water_source' => 'required|string',
            'sewer_source' => 'required|string',
            'cooling_type' => 'required|string',
            'heating_type' => 'required|string',
            'type_of_parking' => 'required|string',
            'images' => 'nullable|array',
            'description' => 'required|string',
            'expected_closing_date' => 'required|date',
            'property_availability' => 'required|string',
            'walk_score' => 'required|integer',
            'transit_score' => 'required|integer',
            'bike_score' => 'required|integer',
        ]);
        if ($create == 1){ //create
            $property->property_type = session()->get('property_detail')['property_type'];
            $property->complete_address = session()->get('property_detail')['complete_address'];
            $property->latitude = session()->get('property_detail')['latitude'];
            $property->longitude = session()->get('property_detail')['longitude'];
            $property->city = session()->get('property_detail')['city'];
            $property->state = session()->get('property_detail')['state'];
            $property->zipcode = session()->get('property_detail')['zipcode'];
        }

        $acceptable_financing_to_json = json_encode($request->acceptable_financing, true);

        $property->price = $request->input('price');
        $property->deal_type = $request->input('deal_type');
        $property->after_repair_value = $request->input('after_repair_value');
        $property->no_of_beds = $request->input('no_of_beds');
        $property->no_of_baths = $request->input('no_of_baths');
        $property->acceptable_financing = $acceptable_financing_to_json;
        $property->total_square_footage = $request->input('total_square_footage');
        $property->association_community = $request->input('association_community') != 'None' ?  $request->input('association_community').'|$'.$request->input('association_community_1') : $request->input('association_community');
        $property->current_zoning = $request->input('current_zoning');
        $property->annual_taxes = $request->input('annual_taxes');
        $property->year_built = $request->input('year_built');
        $property->water_source = $request->input('water_source');
        $property->sewer_source = $request->input('sewer_source');
        $property->cooling_type = $request->input('cooling_type');
        $property->heating_type = $request->input('heating_type');
        $property->type_of_parking = $request->input('type_of_parking');
        $property->description = $request->input('description');
        $property->expected_closing_date = $request->input('expected_closing_date');
        $property->property_availability = $request->input('property_availability');
        $property->member_id = auth()->guard('member')->user()->id;
        //extra features
        $property->bedroom_and_bathroom = $request->input('bedroom_and_bathroom');
        $property->basement = $request->input('basement');
        $property->flooring = $request->input('flooring');
        $property->appliances = $request->input('appliances');
        $property->other_interior_features = $request->input('other_interior_features');
        //Neighborhood
        $property->walk_score = $request->input('walk_score');
        $property->transit_score = $request->input('transit_score');
        $property->bike_score = $request->input('bike_score');


        // dd($property, $request->all());
        $property->save();

            if ($request->hasFile('images')) {
                foreach ($request->images as $key => $image) {
                    /** Upload new image */
                    $upload_location = '/upload/properties/';
                    $file = $image;
                    $name_gen = hexdec(uniqid() . $key) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . $upload_location, $name_gen);
                    $save_url = $upload_location . $name_gen;

                    /** Saving in DB */
                    $property_image = new PropertiesImage;
                    $property_image->property_id = $property->id;
                    $property_image->image = $save_url;
                    $property_image->save();
                }
            }

        // session()->forget('property_detail');
        if ($create == 1){ //create

        //sending email to all members starts
        $getAllMembers = Member::orderby('id','ASC')->get()->pluck('email');
        emailNotificationsJob::dispatch($getAllMembers,$property,'dealPosted');
        //sending email to all members ends

        //sending notifications starts
        $call_member = Member::orderby('id','ASC')->get()->pluck('id');
        $members = $call_member->toArray();
        $body = 'New deal has been posted ( '.$property->property_type.' ), ( '.$property->complete_address.' )';
        $image = asset($property_image->image);
        $type = 'sendToAll';
        $url = route('property_detail',[$property->id]);
        pushNotificationsJob::dispatch($members, $body, $image, $type, $url);
        //sending notifications ends

            $notification = [
                'message' => 'Property Added Successfully',
                'alert-type' => 'success'
            ];
        } else {            //update
            $notification = [
                'message' => 'Property Updated Successfully',
                'alert-type' => 'success'
            ];
        }
        return redirect()->route('dashboard.property_listing')->with($notification);
    }

    public function delete_property_image(PropertiesImage $images)
    {
        if($images !== null)
        {
            if(File::exists(public_path($images->image))){
                File::delete(public_path($images->image));
            }
            $images->delete();
            $notification = [
                'message' => 'Image Deleted Successfully',
                'alert-type' => 'success'
            ];
            return back()->with($notification);
        }

    }

    public function delete_property(Property $property)
    {
        if(count($property->getImages) > 0)
        {
            foreach($property->getImages as $images)
            {
                if(File::exists(public_path($images->image))){
                    File::delete(public_path($images->image));
                }
                $images->delete();
            }
        }
        $property->delete();
        $notification = [
            'message' => 'Property Deleted Successfully',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }


    public function saved_deals(Request $request)
    {
        if ($request->ajax()) {
            $data = SavedDeal::where('member_id',auth()->guard('member')->user()->id);

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('property_type', function ($data) {
                    return $data->getProperty->property_type;
                })
                ->filterColumn('property_type', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('property_type', 'like', "%$keyword%");
                    });
                })
                ->editColumn('complete_address', function ($data) {
                    return $data->getProperty->complete_address;
                })
                ->filterColumn('complete_address', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('complete_address', 'like', "%$keyword%");
                    });
                })
                ->editColumn('no_of_beds', function ($data) {
                    return $data->getProperty->no_of_beds;
                })
                ->filterColumn('no_of_beds', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('no_of_beds', 'like', "%$keyword%");
                    });
                })
                ->editColumn('no_of_baths', function ($data) {
                    return $data->getProperty->no_of_baths;
                })
                ->filterColumn('no_of_baths', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('no_of_baths', 'like', "%$keyword%");
                    });
                })
                ->editColumn('price', function ($data) {
                    return '$ '.$data->getProperty->price;
                })
                ->filterColumn('price', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('price', 'like', "%$keyword%");
                    });
                })
                ->editColumn('expected_closing_date', function ($data) {
                    return $data->getProperty->expected_closing_date;
                })
                ->filterColumn('expected_closing_date', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->whereRaw("DATE_FORMAT(expected_closing_date,'%Y-%m-%d') like ?", ["%$keyword%"]);
                    });
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="' . route('property_detail',[$data->getProperty->id]) . '" class="edit btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a id="delete" class="btn btn-primary btn-sm" href="' . route('dashboard.delete_saved_deals',[$data->id]) . '"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('members.dashboard.saved-deals');
    }

    public function delete_saved_deals($saved_deal)
    {
        $deals = SavedDeal::findOrFail($saved_deal);
        if($deals !== null){
            $deals->delete();
            $notification = [
                'message' => 'Saved Deal Deleted Successfully',
                'alert-type' => 'success'
            ];
            return back()->with($notification);
        }
        else{
            $notification = [
                'message' => 'Something went wrong please try again later.',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    public function offers_recevied(Request $request)
    {
        if ($request->ajax()) {
            $data = Property::with('getOffers')
            ->has('getOffers')
            ->where('property_sold',0)
            ->where('member_id',auth()->guard('member')->user()->id);

            return DataTables::eloquent($data)
                // adding index or s.no
                ->addIndexColumn()
                ->editColumn('price', function ($data) {
                    return '$ ' . $data->price;
                })
                ->filterColumn('price', function ($data, $keyword) {
                    $data->where('price', 'like', "%$keyword%");
                })
                ->editColumn('offer_received', function ($data) {
                    $offer_count = count($data->getOffers->where('type', 1));
                    if($offer_count > 0){
                        $btn = '<a href="' . route('dashboard.offers_received_detail', [$data->id]) . '" class="edit btn btn-secondary btn-sm" title="View Offers"><i class="fa-regular fa-eye"></i> '.$offer_count.' </a>';
                    }else{
                        $btn = "0";
                    }
                    return $btn;
                })
                ->editColumn('buynow', function ($data) {
                    $buynow_count = count($data->getOffers->where('type', 0));
                    if($buynow_count > 0){
                        $btn = '<a href="' . route('dashboard.offers_buynow_specific_property', [$data->id]) . '" class="edit btn btn-primary btn-sm" title="View Offers"><i class="fa-regular fa-eye"></i> '.$buynow_count.' </a>';
                    }else{
                        $btn = "0";
                    }
                    return $btn;
                })
                ->rawColumns(['buynow','offer_received'])
                ->make(true);
        }

        return view('members.dashboard.offers-received');
    }

    public function offers_received_specific_property($id)
    {
        $offers = Offer::with('getProperty','getMember','getOffersDocument')->where('property_id',$id)->where('type',1)->orderby('id','desc')->paginate(10);
        return view('members.dashboard.offers-received-detail',compact('offers'));
    }
    public function offers_buynow_specific_property($id)
    {
        $offers = Offer::with('getProperty','getMember','getOffersDocument')->where('property_id',$id)->where('type',0)->orderby('id','desc')->paginate(10);
        return view('members.dashboard.offers-buynow-detail',compact('offers'));
    }

    public function accept_offer(Offer $offer)
    {
        if($offer == null){
            $notification = [
                'message' => 'Something went wrong please try again later.',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }

        $property = new PropertySold;
        $property->lister_id = $offer->getProperty->getMember->id;
        $property->buyer_id = $offer->buyer_id;
        $property->offer_id = $offer->id;
        $property->buyer_id = $offer->buyer_id;
        $property->property_id = $offer->property_id;
        $property->buying_price = str_replace(',', '', $offer->offer_price);
        $property->save();

        $sold_property = Property::findorFail($property->property_id);
        $sold_property->property_sold = 1;
        $sold_property->save();

        $notification = [
            'message' => 'Offer Accepted Successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->route('dashboard.offers_recevied')->with($notification);
    }

    public function inventory(Request $request)
    {
        $user_id  = auth()->guard('member')->user()->id;

        if ($request->ajax()) {
            $data = PropertySold::with('getProperty')->where('lister_id',$user_id)
            ->orwhere('buyer_id',$user_id);

            return DataTables::eloquent($data)
                // adding index or s.no
                ->addIndexColumn()
                ->editColumn('property_type', function ($data) {
                    return $data->getProperty->property_type;
                })
                ->filterColumn('property_type', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('property_type', 'like', "%$keyword%");
                    });
                })

                ->editColumn('complete_address', function ($data) {
                    return $data->getProperty->complete_address;
                })
                ->filterColumn('complete_address', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('complete_address', 'like', "%$keyword%");
                    });
                })
                ->editColumn('price', function ($data) {
                    return '$ ' . $data->buying_price;
                })
                ->filterColumn('price', function ($data, $keyword) {
                    $data->whereHas('getProperty', function ($data) use ($keyword) {
                        $data->where('price', 'like', "%$keyword%");
                    });
                })
                ->editColumn('purchasing_date', function ($data) {
                    return $data->created_at->format('d-m-Y');
                })
                ->filterColumn('purchasing_date', function ($data, $keyword) {
                        $data->whereRaw("DATE_FORMAT(created_at,'%d-%m-%Y') like ?", ["%$keyword%"]);
                })
                ->addColumn('property_status', function ($data) {
                    if($data->lister_id == auth()->guard('member')->user()->id)
                    {
                        return '<span class="badge rounded-pill bg-secondary ">Sold</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill bg-secondary ">Bought</span>';
                    }
                })
                ->addColumn('property_user', function ($data) {
                    if($data->lister_id === auth()->guard('member')->user()->id)
                    {
                        return '<a href="'.route('dashboard.buyers_detail',[$data->buyer_id]).'"> <span class="badge rounded-pill bg-secondary">'. $data->getBuyer->name .'</span> </a>';
                    }
                    else
                    {
                        return '<a href="'.route('dashboard.buyers_detail',[$data->lister_id]).'"> <span class="badge rounded-pill bg-secondary">'. $data->getLister->name .'</span> </a>';
                    }
                })
                ->addColumn('action', function ($data) {
                    // adding buttons to datatable
                        $btn = '<a href="' . route('property_detail', [$data->getProperty->id]) . '" class="edit btn btn-primary btn-sm" title="View Offers"><i class="fa-regular fa-eye"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['property_status','property_user','action'])
                ->make(true);
        }

        return view('members.dashboard.inventory');
    }


    //for JV partners

    public function my_jv_partner(Request $request)
    {
        if ($request->ajax()) {

            $data = Property::with('getJVPartners')
            ->has('getJVPartners')
            ->where('member_id',auth()->guard('member')->user()->id);

            return DataTables::eloquent($data)
                // adding index or s.no
                ->addIndexColumn()
                ->editColumn('property_type', function ($data) {
                    return $data->property_type;
                })
                ->editColumn('complete_address', function ($data) {
                    return $data->complete_address;
                })
                ->editColumn('price', function ($data) {
                    return '$ ' . $data->price;
                })
                ->editColumn('expected_closing_date', function ($data) {
                    return $data->expected_closing_date;
                })
                ->editColumn('offer_received', function ($data) {
                    $offer_count = $data->getJVPartners->where('status', 0)->count();
                    if($offer_count > 0){
                        $btn = '<a href="'.route('dashboard.my_jv_partner_detail',[$data->id]).'" class="edit btn btn-primary btn-sm" title="View Offers"><i class="fa-regular fa-eye"></i> '.$offer_count.' </a>';
                    }else{
                        $btn = "0";
                    }
                    return $btn;
                })
                ->editColumn('buynow', function ($data) {
                    $buynow_count = $data->getJVPartners->where('status', 1)->count();
                    if($buynow_count > 0){
                        $btn = '<a href="'.route('dashboard.my_jv_partner_detail_accepted',[$data->id]).'" class="edit btn btn-primary btn-sm" title="View Offers"><i class="fa-regular fa-eye"></i> '.$buynow_count.' </a>';
                    }else{
                        $btn = "0";
                    }
                    return $btn;
                })
                ->rawColumns(['buynow','offer_received'])
                ->make(true);
        }
        return view('members.dashboard.jv-partner-listing');
    }
    public function my_jv_partner_detail($id)
    {
        $partners_requests = JVPartner::where('property_id',$id)->where('status',0)->get();
        return view('members.dashboard.my-jv-partners-detail',compact('partners_requests'));
    }
    public function my_jv_partner_detail_accepted($id)
    {
        $partners_requests = JVPartner::where('property_id',$id)->where('status',1)->get();
        return view('members.dashboard.my-jv-partners-detail',compact('partners_requests'));
    }
    public function accept_jv_request($id)
    {
        try {
            $partner = JVPartner::findorfail($id);
            $partner->status = 1;
            $partner->save();

            //sending notifications starts
            $members = [$partner->member_id];
            $title = 'Investor Unite';
            $body = 'Your Jv Partner request has been accepted ('.$partner->getProperty->complete_address.')';
            $image = asset($partner->getProperty->getImages[0]->image);
            $type = 'notify_jv_partner';
            $url = route('property_detail',[$partner->property_id]);
            pushNotificationsJob::dispatch($members, $body, $image, $type, $url);
            //sending notifications ends

            $notification = [
                'message' => 'Request Accepted Successfully.',
                'alert-type' => 'success'
            ];
        } catch (\Exception $e) {
            $notification = [
                'message' => 'Something went wrong please try again later.',
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('dashboard.my_jv_partner')->with($notification);
    }

    public function skip_tracing()
    {
        return view('members.dashboard.skip-tracing');
    }

    public function send()
    {
        //for email
        // $user = "mdmuqtada.twg@gmail.com";
        // $mailData = [
        //     'title' => 'This is my title from controller using traits.',
        //     'body' => 'This is message...'
        // ];
        // $this->buyNow($user, $mailData);

        //for notifications
        $members = [auth()->guard('member')->user()->device_token];
        $title = 'Investor Unite';
        $body = 'Congratulations you have subscribed to Investor unite notifications';
        $image = asset('user/images/property-img-1.png');

        $this->sendNotification($members,$title,$body,$image);

        return 'sent successfully';
    }

}
