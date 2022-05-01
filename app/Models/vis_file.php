<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vis_file extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'path'
    ];
}
