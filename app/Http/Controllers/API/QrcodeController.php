<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Models\Jimpitan;
use App\Models\Models\Warga;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
class QrcodeController extends Controller
{
    public function store(Request $request)
    {
        $cek            =   Jimpitan::where('warga', $request->warga)->where('tanggal', date('Y-m-d'))->first();
        $warga          =   Warga::find($request->warga);
        if ($warga) {
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
                        "idwarga"            =>  $request->warga,
                        "user"               =>  $request->iduser,
                        "tangal"             =>  Carbon::now(),
                    ];

                $user   = User::find($request->iduser);

                $warga  = User::where('idwarga', $request->warga)->first();

                $optionBuilder = new OptionsBuilder();
                $optionBuilder->setTimeToLive(60 * 20);

                $notificationBuilder = new PayloadNotificationBuilder();
                $notificationBuilder
                    ->setTitle('Jimpitan GHR')
                    ->setBody('Berhasil diambil oleh ' . $user->name);

                $dataBuilder = new PayloadDataBuilder();
                // $dataBuilder->addData(['type' => 'promo', 'message' => $message]);

                $option = $optionBuilder->build();
                $notification = $notificationBuilder->build();
                $data = $dataBuilder->build();

                // $downstreamResponse = FCM::sendTo($device_token, $option, $notification, $data);

                FCM::sendTo($warga->remember_token, $option, $notification);
            } else {
                $response['meta']["status"]     =   200;
                $response['meta']["message"]    =   "Sudah di Ambil";
                $response["response"] =
                    [
                        "warga"              =>  $warga->nama,
                        "idwarga"            =>  $request->warga,
                        "user"               =>  $request->iduser,
                        "tangal"             =>  Carbon::now(),
                    ];
            }
        } else {
            $response['meta']["status"]     =   200;
            $response['meta']["message"]    =   "GAGAL";
            $response["response"]           =  [
                "warga"              =>  "Warga Tidak Ditemukan",
            ];
        }

        return response()->json($response, $response['meta']["status"]);
    }
}
