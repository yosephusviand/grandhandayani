<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekapJimpitan extends Model
{
    use HasFactory;

    protected $table = 'rekapjimpitan';

    use SoftDeletes;
}
