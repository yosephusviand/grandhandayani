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
}
