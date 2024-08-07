<?php

namespace App\Http\Controllers;

use AllowDynamicProperties;
use App\Models\people;
//use App\Models\crime_register_record_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

#[AllowDynamicProperties] class crime_register_record_information extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
//        dd($data);
        $data=\App\Models\crime_register_record_information::
        join('people', 'crime_register_record_information.people_id', '=','people.id')
            ->where('people_id', '=', $id)->paginate(5);
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
//        dd($id);
//        $data=DB::table('crime_register_record_information')
//            ->select('crime_register_record_information.*')
//            ->where('crime_register_record_information.id','=',$id)
//            ->get();
        $data=\App\Models\crime_register_record_information::where('crime_register_record_information.people_id','=',$id)->first();

        return view('province.crime_info_record.edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request->all());
        $request->validate([

//                    'description' => 'required|string|max:255',

            // Add other fields as necessary
        ]);

        // Find the user by ID
        $information = \App\Models\crime_register_record_information::findOrFail($id);

        // Update the user's data suspect
        $information->people_id  = $id;
        $information->description = $request->input('description');

        // Update other fields as necessary
        $information->save();

        // Redirect or return a response
        return redirect(url('/crime/info/'.$id))->with('success', 'User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //        dd($id);
        // Find the resource by ID
        $resource = \App\Models\crime_register_record_information::findOrFail($id);

        // Delete the resource
        $resource->delete();

        // Redirect or return a response
        return redirect()->route('crime/info/',$id)->with('success', 'Resource deleted successfully.');
    }
}
