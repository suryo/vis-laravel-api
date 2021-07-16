<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_data_penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 'no_kk', 'id_desa', 'nama_penduduk', 'jenis_kelamin', 'alamat_penduduk'
    ];

}

