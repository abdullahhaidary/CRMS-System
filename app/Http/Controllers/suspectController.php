<?php

namespace App\Http\Controllers;

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
}
