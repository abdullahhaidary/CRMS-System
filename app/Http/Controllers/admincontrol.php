<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class admincontrol extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('users')
            ->select('users.*')
            ->get();
        return view('admin.user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user_from');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save= new User();
        if (!empty($request->picture)) {
            $exe = $request->file('picture')->getClientOriginalExtension();
//            dd($exe);
            $file = $request->file('picture');
            $rename = str::random(20);
            $filename = $rename . '.' . $exe;
            $file->move('/user_photo', $filename);
            $save->	picture = $filename;
        }
        $save->name= $request->name;
        $save->email= $request->email;
        $save->type= $request->name;
        $save->password= $request->name;
        $save->save();

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
