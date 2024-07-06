<?php

namespace App\Http\Controllers;

use AllowDynamicProperties;
use App\Models\people;
//use App\Models\crime_register_record_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

#[AllowDynamicProperties] class crime_register_record_information extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
//        $data=\App\Models\crime_register_record_information::getSingle($id);
//        dd($id);
        $data=DB::table('crime_register_record_information')
            ->join('people', 'people.id', '=', 'crime_register_record_information.people_id')
            ->select('crime_register_record_information.*', 'people.name')
            ->where('people_id', '=', $id)
            ->get();
//        dd($data);
        return view('crime_record_inf.description', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
