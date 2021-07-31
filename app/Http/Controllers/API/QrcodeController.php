<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Models\Jimpitan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrcodeController extends Controller
{
    public function store(Request $request, $id)
    {
        $data           =   new Jimpitan;
        $data->warga    =   $request->warga;
        $data->tanggal  =   Carbon::now();
        $data->bulan    =   date('m');
        // $data->user     =   $request->iduser;
        $data->save();

        $response['meta']["status"]     =   200;
        $response['meta']["message"]    =   "OK";
        $response["response"] =
        [
            "warga"              =>  $request->warga,
            "user"               =>  $request->iduser,
            "tangal"             =>  Carbon::now(),
        ];

        return response()->json($response, $response['meta']["status"]);
    }
}
