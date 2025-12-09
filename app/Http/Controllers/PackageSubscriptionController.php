<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use App\Models\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Coupon;
use Stripe\Exception\ApiErrorException;
use Stripe\Price;
use Stripe\Product;
use Stripe\Stripe;
use Stripe\Subscription;
use Yajra\DataTables\Facades\DataTables;

class PackageSubscriptionController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('app.STRIPE_SECRET_KEY'));
    }
    //packages
    public function package_listing(Request $request)
    {
        if ($request->ajax()) {
            $data = Packages::orderby('id','ASC');

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->addColumn('title', function ($data) {
                    return $data->title;
                })
                ->editColumn('price', function ($data) {
                    return '$ '.$data->price;
                })
                ->filterColumn('price', function ($data, $keyword) {
                        $data->where('price', 'like', "%$keyword%");
                })
                ->addColumn('status', function ($data) {
                    if($data->status == 1)
                    {
                        return '<span class="badge rounded-pill bg-primary">Active</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill bg-dark">InActive</span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="' . route('admin.edit_package',[$data->id]) . '" class="edit btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></i></a>
                    <a id="delete" class="btn btn-primary btn-sm" href="' . route('admin.delete_package',[$data->id]) . '"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('admin.packages');
    }
    public function create_package()
    {
        return view('admin.packages-add');
    }
    public function edit_package(Packages $package)
    {
        return view('admin.packages-edit',compact('package'));
    }
    public function store_package(Packages $packages, Request $request)
    {
        DB::beginTransaction();

            $create = !$packages->id || $packages->id <= 0;

            $this->validate($request, [
                'title' => 'required',
                'listing_details' => 'required',
                'price' => 'nullable',
                'interval' => 'required',
            ]);

        try {

            if ($create) { //
                $packages->title = $request->title;
                $packages->listing_details = json_encode($request->listing_details);
                $packages->price = $request->price;
                $packages->interval = $request->interval;
                $packages->status = $request->status == null ? 0 : 1;
                $packages->save();

                //making product on stripe
                $product = Product::create([
                    'name' => $request->title,
                    'description' => json_encode($request->listing_details),
                    'type' => 'service',
                ]);
                // Create price
                $price = Price::create([
                    'product' => $product->id,
                    'unit_amount' => $request->price * 100, // Convert dollars to cents
                    'currency' => 'USD',
                    'recurring' => [
                        'interval' => $request->interval,
                    ],
                ]);

                $update_package = Packages::where('id', $packages->id)->update(['stripe_product_id' => $product->id, 'stripe_price_id' => $price->id]);

                $notification = [
                    'message' => 'Package Added Successfully',
                    'alert-type' => 'success'
                ];
            } else { //update
                $packages->title = $request->title;
                $packages->listing_details = json_encode($request->listing_details);
                if ($request->price_change == 1) {
                    $packages->price = $request->price;
                }
                $packages->interval = $request->interval;
                $packages->status = $request->status == null ? 0 : 1;
                $packages->save();

                $product = Product::update($packages->stripe_product_id, [
                    'name' => $request->title,
                    'description' => json_encode($request->listing_details),
                ]);

                if ($request->price_change == 1) {

                    $previousPrice = Price::update($packages->stripe_price_id,[
                        'active'=>false
                    ]);

                    $price = Price::create([
                        'product' => $product->id,
                        'unit_amount' => $request->price * 100, // Convert to cents
                        'currency' => 'usd',
                        'recurring' => [
                            'interval' => $request->interval,
                        ],
                    ]);
                    $product = Product::update( $packages->stripe_product_id,
                        ['default_price' => $price->id]
                      );
                    $update_package_price = Packages::where('id', $packages->id)->update(['price'=>$request->price,'stripe_price_id' => $price->id]);
                }

                $notification = [
                    'message' => 'Package Updated Successfully',
                    'alert-type' => 'success'
                ];
            }

            DB::commit();

            return redirect()->route('admin.package_listing')->with($notification);
        } catch (\Exception $e) {
            DB::rollBack();

            $notification = [
                'message' => 'Error : ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->route('admin.package_listing')->with($notification);
        }
    }

    public function delete_package(Packages $package)
    {
        if(isset($package)){
            Product::update($package->stripe_product_id,[
                'active'=>false
            ]);
            $package->delete();

            $notification = [
                'message' => 'Package deleted Successfully',
                'alert-type' => 'success'
            ];
            return back()->with($notification);
        }
        else{
            $notification = [
                'message' => 'Something went wrong please try again later...',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }

    }




    // Subscriptions

    public function subscription_listing(Request $request)
    {
        if ($request->ajax()) {
            $data = Subscriptions::with('getPackages')->orderby('id','ASC');

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->addColumn('package', function ($data) {
                    return $data->getPackages->title;
                })
                ->filterColumn('package', function ($data, $keyword) {
                    $data->whereHas('getPackages', function ($data) use ($keyword) {
                        $data->where('title', 'like', "%$keyword%");
                    });
                })
                ->addColumn('status', function ($data) {
                    if($data->status == 1)
                    {
                        return '<span class="badge rounded-pill bg-primary">Active</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill bg-dark">InActive</span>';
                    }
                })
                ->filterColumn('status', function ($query, $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('status', 0)
                            ->whereRaw("CONVERT('InActive' USING utf8mb4) LIKE ?", ["%{$keyword}%"]);
                    })->orWhere(function ($query) use ($keyword) {
                        $query->where('status', 1)
                            ->whereRaw("CONVERT('Active' USING utf8mb4) LIKE ?", ["%{$keyword}%"]);
                    });
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="' . route('admin.subscription_details',[$data->id]) . '" class="edit btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></i></a>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('admin.subscription-list');
    }

    public function subscription_details(Subscriptions $subscription)
    {
        return view('admin.subscription-detail',compact('subscription'));
    }


    public function coupons_listing(Request $request)
    {
        $coupons = Coupon::all(['limit' => 100])->data;

        if ($request->ajax()) {
            return DataTables::of($coupons)
                //adding index or s.no
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('amount-percent', function ($data) {
                    if($data->amount_off == null)
                    {
                        return $data->percent_off.'%';
                    }else{
                        return '$'.$data->amount_off;
                    }
                })
                ->addColumn('duration', function ($data) {
                    return ucfirst($data->duration);
                })
                ->addColumn('limit', function ($data) {
                    return $data->max_redemptions;
                })
                ->addColumn('redeemed', function ($data) {
                    return $data->times_redeemed;
                })
                ->addColumn('validity', function ($data) {
                    if($data->valid == true)
                    {
                        return '<span class="badge rounded-pill bg-primary">Valid</span>';
                    }
                    else
                    {
                        return '<span class="badge rounded-pill bg-dark">InValid</span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="'.route('admin.coupons_edit',[$data->id]).'" class="edit btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></i></a>
                    <a id="delete" class="btn btn-primary btn-sm" href="'.route('admin.coupons_delete',[$data->id]).'"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['validity','action'])
                ->make(true);
        }
        return view('admin.coupons-list');
    }
    public function coupons_add()
    {
        return view('admin.coupons-add');
    }
    public function coupons_store(Request $request)
    {
            $request->validate([
                'name' => 'required|string',
                'percent_off' => 'nullable|numeric',
                'duration' => 'required|string',
                'limit' => 'required|integer',
            ]);

            try{

                $forCoupon = [
                    'name' => $request->name,
                    'percent_off' => $request->percent_off,
                    'duration' => $request->duration,
                    'max_redemptions' => $request->limit,
                ];

                $coupon = Coupon::create($forCoupon);

                $notification = [
                    'message' => 'Coupon created successfully',
                    'alert-type' => 'success'
                ];
                return redirect()->route('admin.coupons_listing')->with($notification);
            }
            catch (\Throwable $th) {
                $notification = [
                    'message' => 'Error : '. $th,
                    'alert-type' => 'error'
                ];
                return back()->with($notification);
            }
    }

    public function coupons_edit($couponId)
    {
        $coupon = Coupon::retrieve($couponId);
        return view('admin.coupon-edit',compact('coupon'));
    }

    public function coupons_update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        try {
            $couponId = $request->couponId; // Assuming you have a hidden input in your form for the coupon ID

            // Retrieve the coupon from Stripe
            $coupon = Coupon::retrieve($couponId);

            // Update the coupon's attributes
            $coupon->name = $request->name;

            // Save the changes
            $coupon->save();

            $notification = [
                'message' => 'Coupon updated successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('admin.coupons_listing')->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'message' => 'Error: ' . $th->getMessage(),
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }


    public function coupons_delete($couponId)
    {
        try {
            // Retrieve the coupon from Stripe
            $coupon = Coupon::retrieve($couponId);

                $coupon->delete();

                $notification = [
                    'message' => 'Coupon deleted successfully',
                    'alert-type' => 'success'
                ];

            return back()->with($notification);
        } catch (ApiErrorException $e) {
            $error = $e->getError()->message;
            $notification = [
                'message' => 'Error: ' . $error,
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }
}
