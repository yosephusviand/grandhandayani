<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ronda extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ronda';


    public function to_warga()
    {
        return $this->belongsTo(Warga::class, 'warga', 'id');
    }
}
