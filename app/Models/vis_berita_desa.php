<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_berita_desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa', 'judul', 'tanggal', 'berita'
    ];

}

