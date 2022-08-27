<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Shade;
use Illuminate\Support\Str;
use App\Models\Insemination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class calf extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'estimated_live_weight',
        'color_id',
        'shade_id',
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->calf_id)) {
                $model->calf_id = Str::uuid();
            }
        });
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function insemination()
    {
        return $this->belongsTo(Insemination::class);
    }

    public function shade()
    {
        return $this->belongsTo(Shade::class, 'shade_id');
    }
}
