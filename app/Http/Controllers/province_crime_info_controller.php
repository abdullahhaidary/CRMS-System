<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crime_register_record_information;

class province_crime_info_controller extends Controller
{
    public function index($id)
    {
        $data=crime_register_record_information::
        join('people', 'crime_register_record_information.people_id', '=','people.id')
            ->where('people_id', '=', $id)->paginate(5);
        return view('province.crime_info_record.description', compact('data'));
    }
    public function edit(string $id)
    {
//        dd($id);
//        $data=DB::table('crime_register_record_information')
//            ->select('crime_register_record_information.*')
//            ->where('crime_register_record_information.id','=',$id)
//            ->get();
        $data=crime_register_record_information::where('crime_register_record_information.people_id','=',$id)->paginate(5);

        return view('province.crime_info_record.edit',compact('data'));
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
        return redirect(url('province/crime/info/'.$id))->with('success', 'معلومات په موافقیت سره تغیر شول !');

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
        return redirect()->route('province/crime/info/',$id)->with('success', 'Resource deleted successfully.');
    }
}
