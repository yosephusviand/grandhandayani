<?php

namespace App\Http\Controllers;

use App\Models\Models\Jimpitan;
use App\Models\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmumController extends Controller
{
    //

    public function ronda()
    {
        $tanggal    = date('Y-m-d');
        $warga      =   Warga::whereNotIn('id', Jimpitan::select('warga')->where('tanggal', $tanggal))->get();

        return view('landing.ronda', compact('warga', 'tanggal'));
    }

    public function tgljimpitan(Request $request)
    {
        $tanggal    =   $request->tanggal ?? date('Y-m-d');

        return Warga::whereNotIn('id', Jimpitan::select('warga')->where('tanggal', $tanggal))->get();

    }

    public function storeronda(Request $request)
    {
        $exp = explode('-', $request->tanggal);


        $data           =   new Jimpitan;
        $data->warga    =   $request->warga;
        $data->tanggal  =   $request->tanggal;
        $data->bulan    =   $exp[1];
        $data->user     =   0;
        $data->save();

        return back()->with('status', 1)->with('message', 'Berhasil Simpan');
    }
}
