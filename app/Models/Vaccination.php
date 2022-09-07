<?php

namespace App\Models;

use App\Models\calf;
use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vaccination extends Model
{
    use HasFactory;

    public function calf()
    {
        return $this->belongsTo(calf::class, 'calf_id');
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class, 'vaccine_id');
    }
}
