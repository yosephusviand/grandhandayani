<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ronda extends Model
{
    use HasFactory;

    protected $table = 'ronda';

    public function to_warga()
    {
        return $this->belongsTo(Warga::class, 'warga', 'id');
    }
}
