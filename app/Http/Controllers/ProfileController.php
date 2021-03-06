<?php

namespace App\Http\Controllers;

use App\Models\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $warga  =   Warga::whereNotExists(function ($query) {
                    $query->select(DB::raw('id'))
                        ->from('users')
                        ->whereRaw('warga.id = users.idwarga');
                    })->get();

        $data   =   User::all();
        return view('admin.profilelucid', compact('warga', 'data'));
    }

    public function store(Request $request)
    {
        if ($request->idedit == '') {
            $data  =   new User;
            $warga              =   Warga::find($request->warga);
            $data->name         =   $warga->nama;
            $data->email        =   $request->email;
            $data->password     =   Hash::make($request->password);
            $data->account_role =   $request->account;
            $data->idwarga      =   $request->warga;
        } else {
            $data               =   User::find($request->idedit);
            $data->email        =   $request->email;
            $data->password     =   Hash::make($request->password);
        }

        $data->save();

        return back()->with('status', 1)->with('message', 'Berhasil Simpan');
    }

    public function edit(Request $request)
    {
        return User::find($request->id);
    }

    public function delete($id)
    {
        $data   =   User::find($id);
        $data->delete();

        return back()->with('status', 1)->with('message', 'Berhasil Hapus');
    }
}
