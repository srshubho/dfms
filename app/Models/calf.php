<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class calf extends Model
{
    use HasFactory;
    protected $fillable = [
        'calf_name',
        'calf_date_of_birth',
        'calf_gender',
        'calf_estimated_live_weight',
        'calf_color_id',
        'calf_parent_id',
        'calf_shade_id',
    ];


    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            if(empty($model->calf_id)){
                $model->calf_id = Str::uuid();
            }
        });
    }

}
