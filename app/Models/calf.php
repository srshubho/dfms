<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class calf extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'estimated_live_weight',
        'color_id',
        'parent_id',
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
