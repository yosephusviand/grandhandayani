<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';

    public function to_rumah()
    {
        return $this->belongsTo(Rumah::class, 'block', 'id');
    }

    public static function countwarga()
    {
        return Warga::count();
    }
}
