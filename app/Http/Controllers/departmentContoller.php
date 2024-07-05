<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class departmentContoller extends Controller
{
    public function index()
    {
        return view('department.department_view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.department_form');
    }


    public function store(Request $request, $people_id)
    {

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
