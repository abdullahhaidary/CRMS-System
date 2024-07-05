<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class criminalcontroller extends Controller
{
    public function index()
    {
        return view('criminal.criminal');
    }
    public function add()
    {
        return view('criminal.crimnal-form');
    }
    public function inset(Request $request)
    {


    }
}
