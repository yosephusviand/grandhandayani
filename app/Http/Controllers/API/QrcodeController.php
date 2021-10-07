<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Models\Jimpitan;
use App\Models\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrcodeController extends Controller
{
    public function store(Request $request)
    {
        $cek            =   Jimpitan::where('warga', $request->warga)->where('tanggal', date('Y-m-d'))->first();
        $warga          =   Warga::find($request->warga);
        if ($cek == null) {
            $data           =   new Jimpitan;
            $data->warga    =   $request->warga;
            $data->tanggal  =   Carbon::now();
            $data->bulan    =   date('m');
            $data->user     =   $request->iduser;
            $data->save();

            $response['meta']["status"]     =   200;
            $response['meta']["message"]    =   "Berhasil";
            $response["response"] =
                [
                    "warga"              =>  $warga->nama,
                    "user"               =>  $request->iduser,
                    "tangal"             =>  Carbon::now(),
                ];
        } else {
            $response['meta']["status"]     =   200;
            $response['meta']["message"]    =   "Sudah di Ambil";
            $response["response"] =
                [
                    "warga"              =>  $warga->nama,
                    "user"               =>  $request->iduser,
                    "tangal"             =>  Carbon::now(),
                ];
        }

        return response()->json($response, $response['meta']["status"]);
    }
}
