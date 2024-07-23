<?php

namespace App\Http\Controllers;

use App\Models\provinceaccount;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class provincecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('users')
            ->join('province_account','province_account.user_id', '=', 'users.id')
            ->select('users.*', 'province_account.province')
            ->get();
        return view('province_account.index', compact('data'))->with('success', "کاربر به موافقیت راجستر شو !");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=province::get();
//        $district=District::where('id', '=', 'districts.province_id')->
//        get();
        return view('province_account.account', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validate = $request->validate([
            'name'=>'required|min:3|max:35',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
            'province'=>'required',
            'district'=>'required'


        ]);

        $user = new User;

        $user->name=$validate['name'];
        $user->email=$validate['email'];
        $user->type=$request->postion;
        $user->action=$request->action;
        $user->password=Hash::make($validate['password']);
        $user->save();
        $province= new provinceAccount();
        $province->user_id=$user->id;
        $province->province=$request['province'];
        $province->district=$request['district'];
        $province->save();

        return redirect()->route('user')->with('success', "نوی یوزر په موفقیت ذخیره شو!");
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
