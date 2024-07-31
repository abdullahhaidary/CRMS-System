<?php

namespace App\Http\Controllers;

use App\Models\departmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departmentContoller extends Controller
{
    public function index()
    {
        $data=DB::table('departments')
            ->select('departments.*')
            ->get();
        return view('department.department_view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.department_form');
    }


    public function store(Request $request)
    {
        $save= new departmentModel();
        $save->name= $request->d_name;
        $save->head= $request->d_title;
        $save->	short_description=$request->d_description;
        $save->save();
//        dd($request->all());
        return redirect(route('department'))->with('success', "دیپارمنت په موفقیت سره اضافی شو!");
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
