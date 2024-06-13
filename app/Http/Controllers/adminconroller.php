<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminconroller extends Controller
{
    public function index()
    {
        return view('criminal.criminal');
    }
}
