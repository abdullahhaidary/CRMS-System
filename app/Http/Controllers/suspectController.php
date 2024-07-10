<?php

namespace App\Http\Controllers;

use App\Models\crime_register_record_information;
use App\Models\suspectmodel;
use Illuminate\Http\Request;

class suspectController extends Controller
{
    public function index($id){
        $suspects = suspectmodel::where('crime_record_id',$id)->get();
        return view('suspect.index',compact('suspects'));
    }

    public function finger_print_add($id){
        $suspect = suspectmodel::find($id)->first();
        return view('suspect.suspect_finger_add',compact('suspect'));
    }
    public function create()
    {
        return view('suspect.suspect_form');
    }
    public function store(Request $request)
    {
//        dd($request);
        $suspects = suspectmodel::where('crime_record_id',$id)->get();
dd($suspects);
        $suspect= new suspectmodel();
        $suspect->crime_record_id=$savedesc->id;
        $suspect->name=$request->suspect_name;
        $suspect->last_name=$request->last_name;
        $suspect->phone=$request->phone_number;
        $suspect->email=$request->suspect_email;
        $suspect->actual_address=$request->main_address;
        $suspect->current_address=$request->curent_address;

        // $suspect->number_tezkra=$request->tazkera_number;
        $suspect->save();
    }
}
