<?php

namespace App\Http\Controllers;

use App\Models\people;
use App\Models\crime_register_record_information;
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
        $save= new people();
//dd($request->all());
//
        if (!empty($request->ariza_file)) {
            $exe = $request->file('ariza_file')->getClientOriginalExtension();
//            dd($exe);
            $file = $request->file('ariza_file');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('ariza-of-compleint/', $filename);
            $save->	ariza = $filename;
        }

//        $save->id=4;
        $save->name=$request->name;
        $save->last_name=$request->lname;
        $save->father_name=$request->fname;
        $save->email=$request->email;
        $save->phone=$request->phone;
        $save->actual_address=$request->main_address;
        $save->current_address=$request->curent_address;
        $save->crime_case=$request->crime_case;
//        $save->ariza_file=$request->name;
        $save->tazkira_number=$request->tazcira_number;
        $save->	subject_crim=$request->creime_subject;
        $save->	crim_date=$request->crime_date;

//dd($savedPeople->id);
        $save->save();
        $savedPeople = People::where('name', $save->name)->where('phone', $save->phone)->first();
        $description = new crime_register_record_information();
        $description->people_id = $savedPeople->id;
        $description->description = $request->description;
        $description->save();

        return redirect(route('people'))->with('success',"د شکایت کونکی معلومات ذخیره شول اوس معلومات اضافی داخل کړی");


//        dd($request->all());
    }
}
