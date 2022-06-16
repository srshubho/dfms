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
        'cow_name',
        'cow_date_of_purchased',
        'cow_date_of_production',
        'cow_type_id',
        'cow_gender',
        'cow_estimated_live_weight',
        'cow_transaction_cost',
        'cow_labour_cost',
        'cow_color_id',
        'cow_supplier_id',
        'cow_status_id',
        'cow_shade_id',
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
