<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jimpitan extends Model
{
    use HasFactory;

    protected $table = 'jimpitan';
    use SoftDeletes;

    public function to_warga()
    {
        return $this->belongsTo(Warga::class, 'warga', 'id');
    }

    public static function sumhari()
    {
        return Jimpitan::where('tanggal', date('Y-m-d'))->sum('nominal');
    }

    public static function sumbulan()
    {
        $harian =   Jimpitan::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->sum('nominal');
        $bulan  =   Bulanan::where('tahun', date('Y'))->where('bulan', date('m'))->sum('nominal');
        return $harian + $bulan;
    }
    public static function sumtahun()
    {
        $harian =   Jimpitan::whereYear('tanggal', date('Y'))->sum('nominal');
        $bulan  =   Bulanan::where('tahun', date('Y'))->sum('nominal');
        return $harian + $bulan;
    }
    public static function sumtotal()
    {
        $harian =   Jimpitan::sum('nominal');
        $bulan  =   Bulanan::sum('nominal');
        return $harian + $bulan;
    }

}
