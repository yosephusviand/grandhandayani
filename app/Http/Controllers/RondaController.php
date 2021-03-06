<?php

namespace App\Http\Controllers;

use App\Models\Models\Ronda;
use App\Models\Models\Warga;
use Illuminate\Http\Request;

class RondaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data   =   Ronda::all();
        $warga  =   Warga::whereNotIn('id', Ronda::select('warga'))->get();

        return view('admin.rondalucid', compact('data', 'warga'));
    }

    public function store(Request $request)
    {
        if ($request->idedit == '') {

            $data           =   new Ronda;
            $data->hari     =   $request->hari;
            $data->warga    =   $request->warga;
            $data->save();
        } else {
            $data           =   Ronda::find($request->idedit);
            $data->hari     =   $request->hari;
            $data->warga    =   $request->warga;
            $data->save();
        }

        return back()->with('status', 1)->with('message', 'Berhasil Simpan');
    }

    public function destroy($id)
    {
        $data   =   Ronda::find($id);
        $data->delete();

        return back()->with('status', 1)->with('message', 'Berhasil Hapus');
    }
}
