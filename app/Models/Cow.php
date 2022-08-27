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
        'name',
        'date_of_purchased',
        'date_of_production',
        'type_id',
        'gender',
        'estimated_live_weight',
        'transaction_cost',
        'labour_cost',
        'color_id',
        'supplier_id',
        'shade_id',
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
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function cowType()
    {
        return $this->belongsTo(CowType::class, 'type_id');
    }

    public function shade()
    {
        return $this->belongsTo(Shade::class, 'shade_id');
    }

    public function cowImages()
    {
        return $this->hasMany(CowImage::class);
    }
}
