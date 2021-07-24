<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jimpitan extends Model
{
    use HasFactory;

    protected $table = 'jimpitan';

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
        return Jimpitan::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->sum('nominal');
    }

}
