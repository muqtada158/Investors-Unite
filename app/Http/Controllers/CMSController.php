<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CMSController extends Controller
{
    public function faqs(Request $request)
    {
        if ($request->ajax()) {
        // using eloquent model don't use get()
            $data = Faq::query();

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('status', function ($data) {
                    if($data->status == 1){
                        return '<span class="badge bg-primary">Active</span>';
                    }
                    else{
                        return '<span class="badge bg-dark">InActive</span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="' . route('admin.faqs_edit',['faqs'=>$data->id]) . '" class="edit btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></i></a>
                    <a id="delete" class="btn btn-primary btn-sm" href="' . route('admin.faqs_delete',[$data->id]) . '"><i class="fa-sharp fa-solid fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('admin.cms.faqs');
    }

    public function faqs_create()
    {
        return view('admin.cms.faqs-create');
    }

    public function faqs_edit(Faq $faqs)
    {
        return view('admin.cms.faqs-edit',compact('faqs'));
    }

    public function faqs_add_edit(Faq $faqs, Request $request)
    {
        $create = 1;
        (isset($faqs->id) and $faqs->id > 0) ? $create = 0 : $create = 1;

        $this->validate($request, [
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->status = $request->status == null ? 0 : 1;
        $faqs->save();

        if ($create == 1){ //create
            $notification = [
                'message' => 'Faqs Added Successfully',
                'alert-type' => 'success'
            ];
        } else {            //update
            $notification = [
                'message' => 'Faqs Updated Successfully',
                'alert-type' => 'success'
            ];
        }
        return redirect()->route('admin.faqs')->with($notification);
    }
    public function faqs_delete(Faq $faqs)
    {
        if($faqs !== null)
        {
            $faqs->delete();
            $notification = [
                'message' => 'Faqs Deleted Successfully',
                'alert-type' => 'success'
            ];
        }
        else{
            $notification = [
                'message' => 'Something went wrong please try again later',
                'alert-type' => 'error'
            ];
        }

        return back()->with($notification);
    }
}
