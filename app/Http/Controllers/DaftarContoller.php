<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarContoller extends Controller
{
    public function daftar()
    {
        return view('halaman.biodata');
    }
    public function kirim(Request $request)
    {
        $fullname = $request->input('fullname');
        $biodata = $request->input('biodata');

        // compact
        // return view('halaman.home', compact('fullname', 'biodata'));

        // array assosiatif
        //key dapat diganti
        return view('halaman.home', ['fullname' => $fullname, 'biodata' => $biodata]);
    }
}
