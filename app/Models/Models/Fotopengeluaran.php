<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fotopengeluaran extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'fotopengeluaran';
}
