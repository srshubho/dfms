<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shade extends Model
{
    use HasFactory;

    protected $fillable = [
        'shade_no',
        'shade_area',
        'shade_capacity',
        'shade_type',
    ];
}
