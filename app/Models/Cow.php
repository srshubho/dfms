<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cow extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date_of_purchased',
        'date_of_production',
        'inhouse_or_purchased',
        'gender',
        'estimated_live_weight',
        'transaction_cost',
        'labour_cost',
        'color_id',
        'supplier_id',
        'status_id',
    ];
    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            if(empty($model->cow_id)){
                $model->cow_id = Str::uuid();
            }
        });
    }
}
