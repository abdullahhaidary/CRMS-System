<?php

namespace App\Http\Controllers;

use App\Models\casemodel;
use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class casecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data=DB::table('cases')
            ->join('crime_register_record_information', 'crime_register_record_information.id','=', 'cases.crime_record_id')
            ->select('cases.*', 'crime_register_record_information.people_id')
            ->where('crime_record_id', '=', $id)
            ->get();
        return view('cases.case', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        return view('cases.case-from',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        dd($request->all());
//        $validate = $request->validate([
//            'case_name'=>'required|min:3|max:35',
//            'case_number'=>'required',
//            'start_date'=>'required|min:6',
//            'end_date'=>'required',
//            'status'=>'required',
//            'crime_type'=>'required',
//            'crime_location'=>'required',
//            'description'=>'required',
//        ]);
//       $id= new \App\Models\crime_register_record_information();
//       dd($request->all());

        $save= new casemodel();
        $save->crime_record_id=$request->crime_record_id;
//        $save->case_name= $request->case_name;
        $save->case_number= $request->case_number;
        $save->start_date= $request->start_date;
        $save->end_date= $request->end_date;
        $save->	status= $request->case_status;
        $save->	crime_type= $request->crime_location;
        $save->crime_location= $request->crime_type;
        $save->description= $request->description;
        $save->save();
        $id=$request->crime_record_id;
//        return redirect()->url('case/'. $id);
        return redirect(url('case/'.$id))->with('success',"کیس په موفقیت سره ذخیره شو!");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
