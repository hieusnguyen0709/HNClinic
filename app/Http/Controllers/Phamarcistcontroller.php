<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Phamarcistcontroller extends Controller
{
    public function index()
    {
       return view('phamarcist.index');
    }
}
