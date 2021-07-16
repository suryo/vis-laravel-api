<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_perangkat_desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa', 'nik', 'nama_perangkat_desa', 'jabatan'
    ];

}

