<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_kabupaten extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_provinsi', 'kabupaten'
    ];

}
