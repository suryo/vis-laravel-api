<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_kartu_keluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kk', 'nik'
    ];

}

