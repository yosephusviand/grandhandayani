<?php

namespace App\Http\Controllers;

use App\Models\Models\Bulanan;
use App\Models\Models\Fotopengeluaran;
use App\Models\Models\Pengeluaran;
use App\Models\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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
        $data   =   Pengeluaran::get();
        return view('admin.pengeluaran', compact('data'));
    }

    public function storepengeluaran(Request $request)
    {
        $d              =   new Pengeluaran();
        $d->tanggal     =   $request->tanggal;
        $d->bulan       =   Carbon::now()->month;
        $d->tahun       =   Carbon::now()->year;
        $d->kegiatan    =   $request->kegiatan;
        $d->nominal     =   $request->nominal;
        $d->save();

        if ($request->hasFile('gambar')) {
            $foto           =   $request->file('gambar');

            foreach ($foto as $foto) {
                $file                   =   time() . '_' . str_replace(" ", "_", $foto->getClientOriginalName());
                $data                   =   new Fotopengeluaran();
                $data->idpengeluaran    =   $d->id;
                $data->gambar           =   $file;
                $data->save();

                $tujuan_upload = storage_path('app/public/gambar/');
                $foto->move($tujuan_upload, $file);
            }
        } else {

            return back()->with('status', 2)->with('message', 'Gagal Simmpan');
        }

        return back()->with('status', 1)->with('message', 'Berhasil Simmpan');
    }

    public function deletepengeluaran($id)
    {
        $data   =   Pengeluaran::find($id);
        $data2  =   Fotopengeluaran::where('idpengeluaran', $data->id)->get();
        foreach ($data2 as $dat) {
            $dat->delete();
        }
        $data->delete();

        return back()->with('status', 1)->with('message', 'Berhasil Hapus');
    }

    public function foto($id)
    {
        $data   =   Fotopengeluaran::where('idpengeluaran', $id)->get();
        $response = '';
        foreach ($data as $d) {
            $path = storage_path('app/public/gambar/' . $d->gambar);
            $file = File::get($path);
            $type = File::mimeType($path);
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);
        }

        return $response;
    }

    public function lainlain()
    {
        return view('admin.lainlain');
    }
}
