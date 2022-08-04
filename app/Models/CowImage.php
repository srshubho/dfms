<?php

namespace App\Models;

use App\Models\Cow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CowImage extends Model
{
    use HasFactory;

    public function cow()
    {
        return $this->belongsTo(Cow::class, 'Cow_Id');
    }
}
