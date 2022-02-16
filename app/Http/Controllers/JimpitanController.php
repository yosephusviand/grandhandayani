<?php

namespace App\Http\Controllers;

use App\Models\Models\Jimpitan;
use App\Models\Models\RekapJimpitan;
use App\Models\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JimpitanController extends Controller
{
    //

    public function index(Request $request)
    {
        $tanggal    =   $request->taggal ?? date('Y-m-d');
        $warga      =   Warga::whereNotIn('id', Jimpitan::select('warga')->where('tanggal', $tanggal))->get();

        $jimpitan   =   Jimpitan::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->orderBy('id','desc')->get();
        return view('admin.jimpitan', compact('warga', 'jimpitan','tanggal'));
    }

    public function store(Request $request)
    {
        $exp = explode('-', $request->tanggal);

        if ($request->idedit == '') {
            $data           =   new Jimpitan;
            $data->warga    =   $request->warga;
            $data->tanggal  =   $request->tanggal;
            $data->bulan    =   $exp[1];
            $data->user     =   Auth::user()->id;
            $data->save();

        } else {
            $data           =   Jimpitan::find($request->idedit);
            $data->warga    =   $request->warga;
            $data->tanggal  =   $request->tanggal;
            $data->bulan    =   $exp[1];
            $data->nominal  =   $request->nominal;
            $data->user     =   Auth::user()->id;
            $data->save();
        }

        return back()->with('status', 1)->with('message', 'Berhasil Simpan');
    }

    public function edit(Request $request)
    {
        return Jimpitan::find($request->id);
    }

    public function destroy($id)
    {
        $data   =   Jimpitan::find($id);
        $data->delete();

        return back();
    }

    public function chart()
    {
        return Jimpitan::select( DB::raw('tanggal'), DB::raw('sum(nominal) as sumnom'))->whereMonth('tanggal', date('m'))->groupBy('tanggal')->orderBy('tanggal')->get();
    }

    public function tgljimpitan(Request $request)
    {
        $tanggal    =   $request->tanggal ?? date('Y-m-d');

        return Warga::whereNotIn('id', Jimpitan::select('warga')->where('tanggal', $tanggal))->get();

    }

    public function chartbulan(Request $request)
    {

        return Jimpitan::select( DB::raw('bulan'), DB::raw('sum(nominal) as sumnom'))->groupBy('bulan')->orderBy('bulan')->whereYear('tanggal', Carbon::now()->year)->get();

    }

    public function jimbulan(Request $request)
    {

        return Jimpitan::select( DB::raw('bulan'), DB::raw('warga'), DB::raw('sum(nominal) as sumnom'))->whereNotIn('warga', Warga::select('id'))->groupBy('bulan')->orderBy('bulan')->whereYear('tanggal', Carbon::now()->year)->get();

    }
}
