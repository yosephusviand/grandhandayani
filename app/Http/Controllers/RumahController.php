<?php

namespace App\Http\Controllers;

use App\Models\Models\Rumah;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    //

    public function index()
    {

        $data   =   Rumah::all();
        return view('admin.rumah', compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->idedit == '') {

            $data       =   new Rumah;
            $data->nama =   $request->nama;
            $data->save();
        } else {
            $data       =   Rumah::find($request->idedit);
            $data->nama =   $request->nama;
            $data->save();
        }

        return back()->with('status', 1)->with('message', 'Berhasil Simpan');
    }

    public function edit(Request $request)
    {
        return Rumah::find($request->id);
    }

    public function destroy($id)
    {
        $data   =   Rumah::find($id);
        $data->delete();

        return back();
    }
}
