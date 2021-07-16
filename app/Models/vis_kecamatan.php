<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_kecamatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kota', 'id_kabupaten', 'id_provinsi', 'kecamatan'
    ];

}

