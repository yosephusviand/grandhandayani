<?php

namespace App\Http\Controllers;

use App\Models\Models\Bulanan;
use App\Models\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $bulan  = $request->bulan ?? date('m');
        $tahun  = date('Y');
        $warga  =   Warga::where('jimpitan', 2)->whereNotIn('id', Bulanan::select('idwarga')->where('bulan', $bulan)->where('tahun', $tahun))->get();

        $jimpitan   =   Bulanan::where('tahun', date('Y'))->orderBy('id', 'desc')->get();
        return view('admin.jimpitanbulan', compact('warga', 'bulan', 'jimpitan'));
    }

    public function bulanjimpitan(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = date('Y');

        return Warga::where('jimpitan', 2)->whereNotIn('id', Bulanan::select('idwarga')->where('bulan', $bulan)->where('tahun', $tahun))->get();
    }

    public function bulanedit(Request $request)
    {
        return Bulanan::find($request->id);
    }

    public function deletebulan($id)
    {
        $data = Bulanan::find($id);
        $data->delete();

        return back()->with('status', 1)->with('message', 'Berhasil Simmpan');
    }

    public function storejimpitan(Request $request)
    {
        if (!$request->idedit) {
            $data   = new Bulanan();
        } else {
            $data   =   Bulanan::find($request->idedit);
        }

        $data->idwarga  =   $request->warga;
        $data->bulan    =   $request->bulan;
        $data->tahun    =   Carbon::now()->year;
        $data->nominal  =   $request->nominal;
        $data->save();

        return back()->with('status', 1)->with('message', 'Berhasil Simmpan');
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
