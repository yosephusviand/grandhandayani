<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models\Jimpitan;
use App\Models\Models\Ronda;
use App\Models\Models\Rumah;
use App\Models\Models\Warga;
use App\Models\User as ModelsUser;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success, 'user' => $user], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function user($id)
    {
        $user   = ModelsUser::find($id);
        // $warga  =   Warga::where('')
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function ronda()
    {
        $data   =   Ronda::select('ronda.hari', 'warga.nama', 'rumah.nama as block','warga.norumah')
                            ->join('warga', 'ronda.warga', '=', 'warga.id')
                            ->join('rumah', 'warga.block', '=', 'rumah.id')
                            ->get();


        return response()->json(['data' => $data], $this->successStatus);
    }

    public function home()
    {
        $inbulan    =   Jimpitan::sumbulan();
        $inhari     =   Jimpitan::sumhari();
        $intahun    =   Jimpitan::sumtahun();
        $warga      =   Warga::countwarga();

        $data   =   array('inbulan' => $inbulan, 'inhari' => $inhari, 'intahun' => $intahun, 'warga' => $warga);

        return response()->json(['data' => $data], $this->successStatus);
    }
}
