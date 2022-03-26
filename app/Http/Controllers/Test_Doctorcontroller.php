<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test_Doctorcontroller extends Controller
{
    public function index()
    {
        return view('test_doctor.index');
    }
}
