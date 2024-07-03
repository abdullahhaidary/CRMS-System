<?php

namespace App\Http\Controllers;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $save = new \App\Models\complient();

        if (!empty($request->ariza)) {
            $exe = $request->file('ariza')->getClientOriginalExtension();
//            dd($exe);/
            $file = $request->file('ariza');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('ariza-of-compleint/', $filename);
            $save->arza_file = $filename;
        }
        $save->com_name=$request->comname;
        $save->lname=$request->comlname;
        $save->number_of_tazkira=$request->tazkira;
        $save->	phone=$request->phone;
        $save->address=$request->address;
        $save->complient_subject=$request->com_subject;
        $save->complinet_reson=$request->com_rison;
        $save->complinet_date=$request->com_date;
//        $save->arza_file=$request->ariza;
        $save->complinet_description=$request->discription;
        $save->name_criminal=$request->criminal_name;
        $save->	lname_criminal=$request->criminal_lname;
        $save->address_criminal=$request->criminal_address;
        $save->phone_criminal=$request->cphone;
        $save->save();

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
