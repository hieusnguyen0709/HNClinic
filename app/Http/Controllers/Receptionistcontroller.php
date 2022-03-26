<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Receptionistcontroller extends Controller
{
    public function index()
    {
       return view('receptionist.index');
    }
}
