<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Shade;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'cow_shade_id',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->cow_id)) {
                $model->cow_id = Str::uuid();
            }
        });
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'cow_color_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'cow_supplier_id');
    }

    public function cowType()
    {
        return $this->belongsTo(CowType::class, 'cow_type_id');
    }

    public function shade()
    {
        return $this->belongsTo(Shade::class, 'cow_shade_id');
    }
}
