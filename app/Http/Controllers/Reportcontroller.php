<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Reportcontroller extends Controller
{
    public function index()
    {
        return view('Report.Report');
    }
}
