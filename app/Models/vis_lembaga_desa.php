<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_lembaga_desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis_lembaga', 'id_desa', 'lembaga_desa'
    ];

}

