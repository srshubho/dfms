<?php

namespace App\Models;
use App\Models\Shade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CowType extends Model
{
    use HasFactory;
    public function shades()
    {
        return $this->hasMany(Shade::class, 'Cow_Id');
    }
}
