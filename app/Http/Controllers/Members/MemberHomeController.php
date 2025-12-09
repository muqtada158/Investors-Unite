<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Jobs\emailNotificationsJob;
use App\Jobs\pushNotificationsJob;
use App\Models\Contact;
use App\Models\JVPartner;
use App\Models\Member;
use App\Models\Offer;
use App\Models\OfferDocument;
use App\Models\Property;
use App\Models\PropertySold;
use App\Models\SavedDeal;
use App\Traits\emailNotifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MemberHomeController extends Controller
{
    use emailNotifications;

    public function index()
    {
        $properties = Property::orderby('id', 'desc')
        ->where('property_sold', 0)          //property not sold
        ->where('status', 1)                 //property is active
        ->where('property_availability', 1)  //expected closing date is available
        ->take(500)                          // Limit to 500 records
        ->get();
        return view('members.index', compact('properties'));
    }

    public function filterIndex(Request $request)
    {
        $propertyType = $request->input('property_type');
        $propertyAvailability = (int)$request->input('property_availability');
        $dealtype = $request->input('deal_type');
        $priceFrom = $request->input('price_from');
        $priceTo = $request->input('price_to');
        $yearFrom = $request->input('year_from');
        $yearTo = $request->input('year_to');
        $noOfBeds = (int)$request->input('no_of_beds');
        $noOfBaths = (int)$request->input('no_of_baths');

        $query = Property::query();

        if ($propertyType !== null && $propertyType !== 'All') {
            $query->where('property_type', $propertyType);
        }

        if ($propertyAvailability == 0 || $propertyAvailability == 1) {
            $query->where('property_sold', $propertyAvailability);
        }

        if ($dealtype !== null) {
            $query->where('deal_type', $dealtype);
        }

        if ($priceFrom !== null) {
            $query->where('price', '>=', $priceFrom);
        }

        if ($priceTo !== null) {
            $query->where('price', '<=', $priceTo);
        }

        if ($yearFrom !== null) {
            $query->where('year_built', '>=', $yearFrom);
        }

        if ($yearTo !== null) {
            $query->where('year_built', '<=', $yearTo);
        }

        if ($noOfBeds !== 0) {
            if ($noOfBeds == 5) {
                $query->where('no_of_beds', '>', 4);
            } else {
                $query->where('no_of_beds', '<=', $noOfBeds);
            }
        }

        if ($noOfBaths !== 0) {
            if ($noOfBaths == 5) {
                $query->where('no_of_baths', '>', 4);
            } else {
                $query->where('no_of_baths', '<=', $noOfBaths);
            }
        }

        $properties = $query->with('getImages')->where('property_availability', 1)->where('property_sold', 0)->where('status', 1)->get();
        if ($request->wantsJson()) {
            return response()->json(['properties' => $properties]);
        } else {
            return view('members.layouts.index-properties', compact('properties'));
        }
    }

    public function searchIndex(Request $request)
    {
        $search =explode(", ", $request->search);

        $query = Property::query();

        if(count($search) == 4)
        {
            $query->where('complete_address', $request->search);
        }

        if(count($search) == 3)
        {
            $query->where('city', $request->city);
            $query->where('state', $request->state);
        }

        if(count($search) == 2)
        {
            $query->where('state', $request->state);
        }

        $properties = $query->with('getImages')->where('property_availability', 1)->where('property_sold', 0)->where('status', 1)->get();

        if ($request->wantsJson()) {
            return response()->json(['properties' => $properties]);
        } else {
            return view('members.layouts.index-properties', compact('properties'));
        }
    }

    public function sortbyIndex(Request $request)
    {
        $query = Property::query();

        if ($request->data == 'latest') {
            $query->orderBy('id', 'DESC');
        }

        if ($request->data == 'price_low') {
            $query->orderBy('price', 'ASC');
        }

        if ($request->data == 'price_high') {
            $query->orderBy('price', 'DESC');
        }

        $properties = $query->with('getImages')->where('property_availability', 1)->where('property_sold', 0)->where('status', 1)->get();

        if ($request->wantsJson()) {
            return response()->json(['properties' => $properties]);
        } else {
            return view('members.layouts.index-properties', compact('properties'));
        }
    }



    public function myProfile()
    {
        return view('members/member');
    }

    public function my_offers()
    {
        $myoffers = Offer::where('buyer_id', auth()->guard('member')->user()->id)->where('status', 1)->paginate(10);
        return view('members.my-offers', compact('myoffers'));
    }

    public function saved_deals()
    {
        $saved_deals = SavedDeal::where('member_id', auth()->guard('member')->user()->id)->paginate(10);
        return view('members.saved-deals', compact('saved_deals'));
    }

    public function saved_deals_create($property_id)
    {
        $member_id = auth()->guard('member')->user()->id;

        $property_deals = SavedDeal::where('property_id', $property_id)->where('member_id', $member_id)->first();
        if ($property_deals) {
            $property_deals->delete();
            $notification = [
                'message' => 'Property has been removed from saved deals.',
                'alert-type' => 'error'
            ];
            return response()->json(['status' => 0, 'notification' => $notification]);
        } else {
            $saved_deals = new SavedDeal;
            $saved_deals->member_id = $member_id;
            $saved_deals->property_id = $property_id;
            $saved_deals->save();

            $notification = [
                'message' => 'Property has been added to saved deals.',
                'alert-type' => 'success'
            ];
            return response()->json(['status' => 1, 'notification' => $notification]);
        }
    }

    public function saved_deals_remove($property_id)
    {
        $member_id = auth()->guard('member')->user()->id;

        $property_deals = SavedDeal::where('property_id', $property_id)->where('member_id', $member_id)->first();
        if ($property_deals) {
            $property_deals->delete();
            $notification = [
                'message' => 'Property has been removed from saved deals.',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        } else {
            $saved_deals = new SavedDeal;
            $saved_deals->member_id = $member_id;
            $saved_deals->property_id = $property_id;
            $saved_deals->save();

            $notification = [
                'message' => 'Property has been added to saved deals.',
                'alert-type' => 'success'
            ];
            return back()->with($notification);
        }
    }

    public function inventory()
    {
        $inventory = PropertySold::where('buyer_id', auth()->guard('member')->user()->id)->orderby('id', 'DESC')->get();
        return view('members.inventory', compact('inventory'));
    }

    public function contact_us()
    {
        return view('members.contact-us');
    }
    public function send_contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        //email notification starts
        $this->contact('devpetyr911@gmail.com',$contact);
        //email notification ends

        $notification = [
            'message' => 'Your message has been received we will contact you soon...',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }

    public function jv_partners_request()
    {
        return view('members.jv-partners-request');
    }

    public function property_detail(Property $properties)
    {
        if (Carbon::parse($properties->expected_closing_date)->lte(Carbon::today())) {
            $properties->property_availability = 0;
            $properties->status = 0;
            $properties->save();

            $notification = [
                'message' => 'Property has been closed and not available.',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }

        $partner = null;
        $user = null;
        $total_saves = 0;
        if (auth()->guard('member')->check()) {
            $user = auth()->guard('member')->user();
            $partner = JVPartner::where('property_id', $properties->id)->where('member_id', $user->id)->first();
        }

        $total_saves = SavedDeal::where('property_id',$properties->id)->get()->count();

        return view('members.property-detail', compact('properties', 'partner', 'user','total_saves'));
    }

    public function buyer_make_an_offer(Request $request)
    {
        //authenticating the user end
        $userCheck = Property::where('id', $request->property_id)->where('member_id', auth()->guard('member')->user()->id)->first();
        if ($userCheck) {
            $notification = [
                'message' => 'This is your listing, You cannot buy this property',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
        //authenticating the user end

        //validating starts
        $validator = Validator::make($request->all(), [
            'offer_price' => ['required'],
            'earnest_deposit' => ['required'],
            'closing_date' => 'required|date',
            'offer_documents' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $makeAnOffer = $request->type == 0 ? '1' : '0';
            return back()->withErrors($errors)->with('makeAnOffer', $makeAnOffer);
        }
        //validating ends

        $offer = new Offer;
        $offer->buyer_id = auth()->guard('member')->user()->id;
        $offer->property_id = $request->property_id;
        $offer->offer_price = $request->offer_price;
        $offer->earnest_deposit = $request->earnest_deposit;
        $offer->closing_date = $request->closing_date;
        $offer->name = $request->name;
        $offer->phone = $request->phone;
        $offer->email = $request->email;
        $offer->company = $request->company;
        $offer->type = $request->type;
        $offer->status = 1;
        $offer->save();
        if ($request->hasFile('offer_documents')) {
            foreach ($request->offer_documents as $key => $image) {
                /** Upload documents */
                $upload_location = '/upload/offer_documents/';
                $file = $image;
                $name_gen = hexdec(uniqid() . $key) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . $upload_location, $name_gen);
                $save_url = $upload_location . $name_gen;

                /** Saving in DB */
                $offer_documents = new OfferDocument();
                $offer_documents->offer_id = $offer->id;
                $offer_documents->document = $save_url;
                $offer_documents->save();
            }
        }

        //sending email notification starts
        $lister = $offer->getProperty->getMember->email;
        $property = $offer;

        if ($request->type == 0) //buynow
        {
            //sending email to buyer starts
            emailNotificationsJob::dispatch([$lister], $property, 'buyNow');
            //sending email to buyer ends

            //sending notifications starts
            $members = [$offer->getProperty->getMember->id];
            $title = 'Investor Unite';
            $body = 'You have a got a new BUYNOW offer from ' . $offer->getMember->name . ' on your property (' . $offer->getProperty->complete_address . ')';
            $image = asset($offer->getProperty->getImages[0]->image);
            $type = 'notify_buy_now';
            $url = route('dashboard.offers_buynow_specific_property', [$offer->property_id]);
            pushNotificationsJob::dispatch($members, $body, $image, $type, $url);
            //sending notifications ends
        }
        else //offer received
        {
            //sending email to buyer starts
            emailNotificationsJob::dispatch([$lister], $property, 'makeAnOffer');
            //sending email to buyer ends

            //sending notifications starts
            $members = [$offer->getProperty->getMember->id];
            $title = 'Investor Unite';
            $body = 'You have a got a new OFFER from ' . $offer->getMember->name . ' on your property (' . $offer->getProperty->complete_address . ')';
            $image = asset($offer->getProperty->getImages[0]->image);
            $type = 'notify_offer_received';
            $url = route('dashboard.offers_received_detail', [$offer->property_id]);
            pushNotificationsJob::dispatch($members, $body, $image, $type, $url);
            //sending notifications ends
        }

        //sending email notification ends

        $notification = [
            // 'message' => 'Your offer has been submitted successfully.',
            // 'alert-type' => 'success',
            'submit-buy-now' => 'true'

        ];
        return back()->with($notification);
    }

    public function filter_inventory(Request $request)
    {
        $query = PropertySold::where('buyer_id', auth()->guard('member')->user()->id);

        if ($request->has('address') and $request->address !== null) {
            $query->whereHas('getProperty', function ($query) use ($request) {
                $query->where('complete_address', 'like', '%' . $request->address . '%');
            });
        }

        if ($request->has('city') and $request->city !== null) {
            $query->whereHas('getProperty', function ($query) use ($request) {
                $query->where('city', 'like', '%' . $request->city . '%');
            });
        }

        if ($request->has('property_type') and $request->property_type !== null) {
            $query->whereHas('getProperty', function ($query) use ($request) {
                $query->where('property_type', $request->property_type);
            });
        }

        if ($request->has('price_from') and $request->price_from !== null) {
            $query->whereHas('getProperty', function ($query) use ($request) {
                $query->where('price', '>=', $request->price_from);
            });
        }

        if ($request->has('price_to') and $request->price_to !== null) {
            $query->whereHas('getProperty', function ($query) use ($request) {
                $query->where('price', '<=', $request->price_to);
            });
        }

        $inventory = $query->orderBy('id', 'DESC')->get();

        return view('members.inventory', compact('inventory'));
    }

    //for jv partners
    public function store_jv_partner(Request $request)
    {
        //authenticating the user end
        $userCheck = Property::where('id', $request->property_id)->where('member_id', auth()->guard('member')->user()->id)->first();
        if ($userCheck) {
            return response()->json(['status' => 4]);
        }
        //authenticating the user end

        $validate = JVPartner::where('lister_id', $request->lister_id)->where('property_id', $request->property_id)->where('member_id', $request->member_id)->first();
        $check_profileStatus = Member::where('id', $request->member_id)->where('profile_status', 0)->first();

        if ($validate) {
            return response()->json(['status' => 2]);
        } elseif ($check_profileStatus) {
            return response()->json(['status' => 3]);
        } else {
            $partner = new JVPartner();
            $partner->lister_id = $request->lister_id;
            $partner->property_id = $request->property_id;
            $partner->member_id = $request->member_id;
            $partner->status = 0;
            $partner->save();

            //sending email to buyer starts
            emailNotificationsJob::dispatch([$partner->getLister->email], $partner, 'jvPartnerRequest');
            //sending email to buyer ends

            //sending notifications starts
            $members = [$partner->lister_id];
            $title = 'Investor Unite';
            $body = 'Your got a request for JV PARTNER on your property ('.$partner->getProperty->complete_address.')';
            $image = asset($partner->getProperty->getImages[0]->image);
            $type = 'notify_jv_partner';
            $url = route('dashboard.my_jv_partner_detail',[$request->property_id]);
            pushNotificationsJob::dispatch($members, $body, $image, $type, $url);
            //sending notifications ends

            if ($partner->save()) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 0]);
            }
        }
    }
}
