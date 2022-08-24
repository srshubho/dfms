<?php

namespace App\Models;

use App\Models\Breed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bull extends Model
{
    use HasFactory;

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}
