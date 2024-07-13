<?php

namespace App\Http\Controllers;

use App\Models\FingerprintModel;
use App\Models\suspectmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class suspectController extends Controller
{
    public function index($id){
        $suspects = suspectmodel::where('crime_record_id',$id)->get();
        return view('suspect.index',compact('suspects'));
    }

    public function finger_print_add($id){
        $data=DB::table('suspect')->select('suspect.*')->where('suspect.id','=', $id)->get();
        $suspect = suspectmodel::find($id)->first();
        return view('suspect.suspect_finger_add',compact('suspect','data'));
    }

    public function store_finger_print(Request $request){
        $fingerprints = new FingerprintModel();
        $fingerprints->suspect_id = $request->id;
        $fingerprints->right_thumb = $request->RightThumb;
        $fingerprints->left_thumb = $request->LeftThumb;
        $fingerprints->right_index = $request->RightIndex;
        $fingerprints->left_index = $request->LeftIndex;
        $fingerprints->save();
    }
}
