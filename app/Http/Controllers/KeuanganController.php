<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.jimpitanbulan');
    }

    public function store(Request $request)
    {
        
    }

    public function pengeluaran()
    {
        return view('admin.pengeluaran');
    }

    public function lainlain()
    {
        return view('admin.lainlain');
    }
}
