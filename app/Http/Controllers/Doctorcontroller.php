<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Doctorcontroller extends Controller
{
    public function index()
    {
       return view('doctor.index');
    }
}
