<?php

namespace App\Models;

use App\Models\Vaccination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vaccine extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vaccination()
    {
        return $this->hasMany(Vaccination::class);
    }
}
