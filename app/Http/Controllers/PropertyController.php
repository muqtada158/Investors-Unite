<?php

namespace App\Http\Controllers;

use App\Models\PropertiesImage;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class PropertyController extends Controller
{
    public function property_listing(Request $request)
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
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="' . route('admin.property_detail_edit',[$data->id]) . '" class="edit btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></i></a>
                    <a id="delete" class="btn btn-danger btn-sm" href="' . route('admin.delete_property',[$data->id]) . '"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.property-list');
    }

    public function property_step_1()
    {
        return view('admin.property-step-1');
    }
    public function property_step_1_create_edit(Request $request)
    {
        $this->validate($request, [
            'property_type' => 'required',
        ]);
        $request->session()->put('property_detail.property_type', $request->property_type);
        return redirect()->route('admin.property_step_2');
    }

    public function property_step_2()
    {
        return view('admin.property-step-2');
    }
    public function property_step_2_create_edit(Request $request)
    {
        $this->validate($request, [
            'complete_address' => 'required',
        ]);
        $request->session()->put('property_detail.complete_address', $request->complete_address);
        return redirect()->route('admin.property_detail');
    }

    public function property_step_3()
    {
        return view('admin.property-step-3');
    }

    public function property_detail()
    {
        return view('admin.property-detail');
    }
    public function property_detail_edit(Property $property)
    {
        return view('admin.property-detail-edit',compact('property'));
    }
    public function property_detail_add_edit(Property $property, Request $request)
    {
        $create = 1;
        (isset($property->id) and $property->id > 0) ? $create = 0 : $create = 1;

        $this->validate($request, [
            'price' => 'required|numeric',
            'after_repair_value' => 'required|numeric',
            'no_of_beds' => 'required|integer',
            'no_of_baths' => 'required|integer',
            'acceptable_financing' => 'required|numeric',
            'total_square_footage' => 'required|string',
            // 'association_community' => 'required|string',
            'current_zoning' => 'required|string',
            'annual_taxes' => 'required|numeric',
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
        ]);

        if ($create == 1){ //create
            $property->property_type = session()->get('property_detail')['property_type'];
            $property->complete_address = session()->get('property_detail')['complete_address'];
        }

        $property->price = $request->input('price');
        $property->after_repair_value = $request->input('after_repair_value');
        $property->no_of_beds = $request->input('no_of_beds');
        $property->no_of_baths = $request->input('no_of_baths');
        $property->acceptable_financing = $request->input('acceptable_financing');
        $property->total_square_footage = $request->input('total_square_footage');
        $property->association_community = $request->input('association_community');
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

        session()->forget('property_detail');
        if ($create == 1){ //create
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
        return redirect()->route('admin.property_listing')->with($notification);
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
}
