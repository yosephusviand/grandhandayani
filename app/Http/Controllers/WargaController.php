<?php

namespace App\Http\Controllers;

use App\Models\Models\Rumah;
use App\Models\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $block  =   Rumah::all();
        $warga  =   Warga::orderBy('block')->orderBy('norumah')->get();
        $users  =   User::where('account_role', 'user')->get();
             
        return view('admin.wargalucid', compact('block', 'warga'));
    }

    public function store(Request $request)
    {
        if ($request->idedit == '') {

            $data           =   new Warga;
            $data->block    =   $request->block;
            $data->norumah  =   $request->norumah;
            $data->nama     =   $request->nama;
            $data->status   =   $request->status;
            $data->jimpitan =   $request->jimpitan;
            $data->save();
        } else {
            $data           =   Warga::find($request->idedit);
            $data->block    =   $request->block;
            $data->norumah  =   $request->norumah;
            $data->nama     =   $request->nama;
            $data->status   =   $request->status;
            $data->jimpitan =   $request->jimpitan;
            $data->save();
        }

        return back()->with('status', 1)->with('message', 'Berhasil Simpan');
    }

    public function edit(Request $request)
    {
        return Warga::find($request->id);
    }

    public function destroy($id)
    {
        $data   =   Warga::find($id);
        $data->delete();

        return back();
    }
}
