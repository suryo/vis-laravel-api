<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_surat_masuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis_surat', 'tgl_masuk'
    ];

}

