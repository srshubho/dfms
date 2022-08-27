<?php

namespace App\Models;

use App\Models\Cow;
use App\Models\Bull;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insemination extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->insemination_id)) {
                $model->insemination_id = Str::uuid();
            }
        });
    }

    public function cow()
    {
        return $this->belongsTo(Cow::class);
    }

    public function bull()
    {
        return $this->belongsTo(Bull::class);
    }
}
