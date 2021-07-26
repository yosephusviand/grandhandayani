<?php

namespace App\Http\Controllers;

use App\Models\Models\Jimpitan;
use App\Models\Models\Ronda;
use App\Models\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmumController extends Controller
{
    //

    public function ronda()
    {
    
        $data   =   Ronda::all();

        return view('landing.ronda', compact('data'));
    }

    public function tgljimpitan(Request $request)
    {
        $tanggal    =   $request->tanggal ?? date('Y-m-d');

        return Warga::whereNotIn('id', Jimpitan::select('warga')->where('tanggal', $tanggal))->get();

    }

}
