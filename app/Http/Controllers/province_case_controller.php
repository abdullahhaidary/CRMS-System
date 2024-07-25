<?php

namespace App\Http\Controllers;

use App\Models\casemodel;
use Illuminate\Http\Request;

class province_case_controller extends Controller
{
    public function index($id)
    {

        $data=casemodel::where('crime_record_id','=',$id)->paginate(3);
        return view('province.case.case', compact('data', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        return view('province.case.case-from',compact('id'));
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
        $save->case_number= $request->case_number;
        $save->start_date= $request->start_date;
        $save->end_date= $request->end_date;
        $save->	status= $request->case_status;
        $save->	crime_type= $request->crime_type;
        $save->crime_location= $request->crime_location;
        $save->description= $request->description;
        $save->save();
        $id=$request->crime_record_id;
//        return redirect()->url('case/'. $id);
        return redirect(url('/province/case/'.$id))->with('success',"کیس په موفقیت سره ذخیره شو!");

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
