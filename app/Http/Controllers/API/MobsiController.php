<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobsiController extends Controller
{

    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['devid' => request('devid'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success, 'user' => $user], $this->successStatus);
        } else {
            return response()->json(['success' => 'gagal'], 200);
        }
    }

    public function curlget(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://mpresensi.gunungkidulkab.go.id/api/index.php/cekdevice/'. $request->devid,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ));

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://mpresensi.gunungkidulkab.go.id/api/index.php/presensi/"+nip+"/"+tipe+"/"+latlon+"/"+jarak+"/-/"+token,
        // https://mpresensi.gunungkidulkab.go.id/api/index.php/presensi/"+nip+"/"+tipe+"/"+latlon+"/"+jarak+"/-/"+token,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30000,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_SSL_VERIFYPEER => false,
        //     // CURLOPT_POSTFIELDS =>,
        //     CURLOPT_HTTPHEADER => array(
        //         // Set here requred headers
        //         "accept: */*",
        //         "accept-language: en-US,en;q=0.8",
        //         "content-type: application/json",
        //     ),
        // ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return response($err);
        } else {
            $data = json_decode($response, true);
            return response($data);
        }
    }
}
