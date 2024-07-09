<?php

namespace App\Http\Controllers;

use App\Models\criminal;
use Illuminate\Http\Request;

class criminalcontroller extends Controller
{
    public function index()
    {
        return view('criminal.criminal');
    }
    public function more()
    {
        return view('criminal.criminal_all');
    }
    public function add()
    {
        return view('criminal.crimnal-form');
    }
    public function inset(Request $request)
    {



        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'lname' => 'required|string|max:255',
        //     'father_name' => 'required|string|max:255',
        //     'phone' => 'required|string|max:15',
        //     'email' => 'required|email|max:255',
        //     'current_address' => 'required|string|max:255',
        //     'actual_address' => 'required|string|max:255',
        //     'dateofbirth' => 'required|date',
        //     'gender' => 'required|in:1,0',
        //     'job' => 'required|string|max:255',
        //     'marital_status' => 'required|in:مجرد,متاهل',
        //     'familymember' => 'required|string|max:255',
        //     'discription' => 'required|string',
        //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $criminal = new criminal([
            'name' => $request->input('name'),
            'last_name' => $request->input('lname'),
            'father_name' => $request->input('father_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'current_address' => $request->input('current_address'),
            'actual_address' => $request->input('actual_address'),
            'date_of_birth' => $request->input('dateofbirth'),
            'gender' => $request->input('gender'),
            'job' => $request->input('job'),
            'marital_status' => $request->input('marital_status'),
            'family_members' => $request->input('familymember'),
            'description' => $request->input('discription'),
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('photos', 'public');
            $criminal->photo_path = $path;
        }

        $criminal->save();

        return redirect()->route('criminal.index')->with('success', 'Criminal record created successfully.');

    }
}
