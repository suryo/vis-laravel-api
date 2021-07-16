<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_master_surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis_lembaga', 'file', 'link', 'version_date'
    ];

}

