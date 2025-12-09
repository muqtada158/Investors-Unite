<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\LenderNotes;
use App\Models\Member;
use App\Models\MoneyLender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;
use Yajra\DataTables\Facades\DataTables;

class LenderController extends Controller
{
    public function __construct() {
        if(Auth::guard('member')->check())
        {
            $userType = intval(auth()->guard('member')->user()->type);
            if($userType !== 4){
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function lender_notebook(Request $request)
    {
        if ($request->ajax()) {
            $data = LenderNotes::where('member_id',auth()->guard('member')->user()->id);

            return DataTables::eloquent($data)
                //adding index or s.no
                ->addIndexColumn()
                ->editColumn('money_lended', function ($data) {
                    return empty($data->money_lended) ? '' : '$ '.$data->money_lended;
                })
                ->editColumn('interest', function ($data) {
                    return empty($data->interest) ? '' : '% '.$data->interest;
                })
                ->addColumn('action', function ($data) {
                    //adding buttons to datatable
                    $btn = '<a href="#" data-bs-toggle="modal" onclick="getEditData('.$data->id.')" data-bs-target="#edit_note" class="btn btn-primary btn-sm" title="View Note">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"  viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff"  d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                    </a>
                    <a href="'.route('delete_note',[$data->id]).'" id="delete" class="btn btn-primary btn-sm" title="View Note">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('members.my-account.lender-notebook');
    }

    public function get_edit_data(Request $request)
    {
        $get_notes = LenderNotes::where('id',$request->id)->first();
        return view('members.layouts.lender-edit-notes',compact('get_notes'));
    }

    public function add_edit_lender_notes(LenderNotes $lender_notes, Request $request)
    {
        $create = 1;
        (isset($lender_notes->id) and $lender_notes->id > 0) ? $create = 0 : $create = 1;

        $this->validate($request, [
            'date' => 'required|date'
        ]);

        $lender_notes->member_id = auth()->guard('member')->user()->id;
        $lender_notes->date = $request->date;
        $lender_notes->user_name = $request->user_name;
        $lender_notes->money_lended = $request->money_lended;
        $lender_notes->interest = $request->interest;
        $lender_notes->comments = $request->comments;
        $lender_notes->save();

        if ($create == 1){ //create
            $notification = [
                'message' => 'Note Added Successfully',
                'alert-type' => 'success'
            ];
        } else {//update
            $notification = [
                'message' => 'Note Updated Successfully',
                'alert-type' => 'success'
            ];
        }

        return back()->with($notification);
    }

    public function delete_note(LenderNotes $lender_notes)
    {
        $lender_notes->delete();
        $notification = [
            'message' => 'Note Deleted Successfully',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }

    public function lender_details()
    {
        $lender = MoneyLender::where('member_id',auth()->guard('member')->user()->id)->first();
        return view('members.my-account.lender-detail',compact('lender'));
    }

    public function lender_details_update(Request $request)
    {
        $this->validate($request, [
            'years_of_lending' => ['required', 'string', 'max:255'],
            'lending_min' => ['required', 'numeric'],
            'lending_max' => ['required', 'numeric'],
            'type_of_lending' => ['required', 'string', 'max:255'],
            'interest_rate' => ['required','numeric']
        ]);

        $money_lender = MoneyLender::where('member_id',auth()->guard()->user()->id)->update([
            'years_of_lending' => $request['years_of_lending'],
            'lending_min' => $request['lending_min'],
            'lending_max' => $request['lending_max'],
            'type_of_lending' => $request['type_of_lending'],
            'interest_rate' => $request['interest_rate'],
            'status' => 1,
        ]);

        if($money_lender){
            $notification = [
                'message' => 'Lender Updated Successfully',
                'alert-type' => 'success'
            ];
        }else{
            $notification = [
                'message' => 'Error! Something went wrong...',
                'alert-type' => 'danger'
            ];
        }

        return back()->with($notification);
    }

    public function lender_search(Request $request)
    {
        $lenders = MoneyLender::with('member')
        ->when($request->price_from !== null, function ($query) use ($request) {
            return $query->whereRaw('CAST(lending_min AS UNSIGNED) >= ?', [$request->price_from]);
        })
        ->when($request->price_to !== null, function ($query) use ($request) {
            return $query->whereRaw('CAST(lending_max AS UNSIGNED) <= ?', [$request->price_to]);
        })
        ->when($request->lending_type !== null, function ($query) use ($request) {
            return $query->where('type_of_lending', $request->lending_type);
        })
        ->get();

        return view('members.private-money-lenders-ajax',compact('lenders'));
    }
}
