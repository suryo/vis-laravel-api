<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_jenis_potensi_desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa', 'nama_potensi'
    ];

}
