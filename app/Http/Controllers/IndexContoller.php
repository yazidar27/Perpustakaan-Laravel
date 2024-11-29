<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexContoller extends Controller
{
    public function index()
    {
        return view('home');
    }
}
