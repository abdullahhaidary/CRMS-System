<?php

namespace App\Http\Controllers;

use App\Models\peoplemolde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class pepolecontroller extends Controller
{
    public function index()
    {
        $data=DB::table('people')
            ->select('people.*')
            ->get();
        return view('people.people', compact('data'));
    }
    public function create()
    {
        return view('people.people_form');
    }
    public function store(Request $request)
    {
        $save= new peoplemolde();
//dd($request->all());
//        if (!empty($request->ariza_file)) {
//            $exe = $request->file('ariza')->getClientOriginalExtension();
//            dd($exe);
//            $file = $request->file('ariza');
//            $rename = str::random(20);
//            $filename = $rename . '.' . $exe;
//            $file->move('ariza-of-compleint/', $filename);
//            $save->ariza_file = $filename;
//        }
        if (!empty($request->ariza_file)) {
            $exe = $request->file('ariza_file')->getClientOriginalExtension();
//            dd($exe);
            $file = $request->file('ariza_file');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('ariza-of-compleint/', $filename);
            $save->	ariza = $filename;
        }

        $save->id=3;
        $save->name=$request->name;
        $save->father_name=$request->fname;
        $save->email=$request->email;
        $save->phone=$request->phone;
        $save->actual_address=$request->main_address;
        $save->current_address=$request->curent_address;
        $save->crime_case=$request->crime_case;
//        $save->ariza_file=$request->name;
        $save->last_name=$request->lname;
        $save->tazkira_number=$request->tazcira_number;
        $save->	subject_crim=$request->creime_subject;
        $save->	crim_date=$request->crime_date;
        $save->save();


        return redirect(route('people'))->with('success',"د شکایت کونکی معلومات ذخیره شول اوس معلومات اضافی داخل کړی");


//        dd($request->all());
    }
}
