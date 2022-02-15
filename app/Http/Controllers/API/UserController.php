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
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class UserController extends Controller
{

    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success, 'user' => $user], $this->successStatus);
        } else {
            return response()->json(['success' => 'Username atau Password Salah'], 200);
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
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success' => $success], $this->successStatus);
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
        $data   =   Ronda::select('ronda.hari', 'warga.nama', 'rumah.nama as block', 'warga.norumah')
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
        $intotal    =   Jimpitan::sumtotal();
        $warga      =   Warga::countwarga();

        $data   =   array('inbulan' => $inbulan, 'inhari' => $inhari, 'intahun' => $intahun, 'intotal' => $intotal,'warga' => $warga);

        return response()->json(['data' => $data], $this->successStatus);
    }

    public function userjimpitan($id)
    {
        $user       =   ModelsUser::find($id);

        $jimpitan   =   Jimpitan::join('warga', 'jimpitan.warga', '=', 'warga.id')
            ->where('jimpitan.warga', $user->idwarga)
            ->groupBy('jimpitan.warga')
            ->sum('nominal');

        $userjimpit =   Jimpitan::join('users', 'jimpitan.user', '=', 'users.id')
            ->where('jimpitan.user', $user->id)
            ->groupBy('jimpitan.user')
            ->sum('nominal');

        $jimpithari =  Jimpitan::join('users', 'jimpitan.user', '=', 'users.id')
            ->where('jimpitan.user', $user->id)
            ->where('jimpitan.tanggal', Carbon::now())
            ->groupBy('jimpitan.user')
            ->sum('nominal');

        // $data   =   array('data' => $jimpitan, 'userjim' => $userjimpit);

        return response()->json(['data' => $jimpitan, 'userjim' => $userjimpit, 'jimhari' => $jimpithari], $this->successStatus);
    }

    public function riwayatjimpit($id)
    {
        $user                   =   ModelsUser::find($id);
        $data   =   Jimpitan::select('jimpitan.nominal', 'jimpitan.bulan', 'jimpitan.tanggal', 'users.name')
                            ->join('warga', 'jimpitan.warga', '=', 'warga.id')
                            ->join('users', 'jimpitan.user', '=', 'users.id')
                            ->whereYear('jimpitan.tanggal', Carbon::now()->year)
                            ->whereMonth('jimpitan.tanggal', Carbon::now()->month)
                            ->where('warga', $user->idwarga)
                            ->orderBy('jimpitan.tanggal')
                            ->get();

        return response()->json(['data' => $data]);
    }

    public function storetoken(Request $request)
    {
        $user                   =   ModelsUser::find($request->id);

        $user->remember_token   =   $request->token;
        $user->save();

        return response()->json(['data' => 'Success'], $this->successStatus);
    }
}
