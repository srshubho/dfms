<?php

namespace App\Models;

use App\Models\CowType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shade extends Model
{
    use HasFactory;

    protected $fillable = [
        'shade_no',
        'shade_area',
        'shade_capacity',
        'shade_type',
    ];

    public function cowtype()
    {
        return $this->belongsTo(CowType::class, 'shade_type', 'id');
    }
}
