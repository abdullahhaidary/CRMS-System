<?php

namespace App\Http\Controllers;

use App\Models\crime_register_record_information;
use App\Models\People;
use App\Models\r;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class complient extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('complients')
            ->select('complients.*')
            ->get();
        return view('complint.complint_list', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('complint.complint');
    }


    public function store(Request $request){
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'father_name' => 'required|string|max:255',
        //     'email' => 'nullable|string|email|max:255',
        //     'phone' => 'required|string|max:255',
        //     'tazkira_number' => 'required|string|max:255',
        //     'actual_address' => 'required|string|max:255',
        //     'current_address' => 'required|string|max:255',
        //     'crime_case' => 'nullable|string|max:255',
        //     'ariza' => 'nullable|string|max:255',
        //     'subject_crim' => 'required|string|max:255',
        //     'crim_date' => 'required|string|max:255',
        // ]);

        $people = new People();
        if (!empty($request->ariza)) {
            $exe = $request->file('ariza')->getClientOriginalExtension();
//            dd($exe);/
            $file = $request->file('ariza');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('ariza-of-compleint/', $filename);
            $people->ariza = $filename;
        }
        $people->name=$request->comname;
        $people->last_name=$request->comlname;
        $people->tazkira_number=$request->tazkira;
        $people->father_name=$request->father_name;
        $people->phone=$request->phone;
        $people->current_address=$request->current_address;
        $people->actual_address=$request->actual_address;
        $people->subject_crim=$request->com_subject;
        $people->crim_date=$request->com_date;
        $people->email=$request->email;
        $savedPeople = People::where('name', $people->name)->where('phone', $people->phone)->first();
        $people->save();
        $description = new crime_register_record_information();
        $description->people_id = $savedPeople->id;
        $description->description = $request->discription;
        $description->save();
        return redirect(url('/complint_list'))->with('success', "ستاسو شکایت په موفقیت سره ذخیره شو!");
    }

    /**
     * Display the specified resource.
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(r $r)
    {
        //
    }
}
