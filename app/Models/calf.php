<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calf extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'estimated_live_weight',
        'color_id',
        'parent',
    ];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            if(empty($model->id)){
                $model->id = Str::uuid();
            }
        });
    }

}
