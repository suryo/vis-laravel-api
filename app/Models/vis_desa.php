<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_provinsi', 'id_kota', 'id_kabupaten', 'id_kecamatan', 'nama_desa', 'alamat_lengkap', 'deskripsi'
    ];

}

