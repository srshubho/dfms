<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Cow;
use App\Models\Bull;
use App\Models\AssignCowToStaff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignTask extends Model
{
    use HasFactory;
    protected $fillable = ["cow_id"];

    public function assign()
    {
        return $this->belongsTo(AssignCowToStaff::class, 'assign_id');
    }

    public function cow()
    {
        return $this->belongsTo(Cow::class, 'cow_id');
    }

    public function bull()
    {
        return $this->belongsTo(Bull::class, 'bull_id');
    }

    public function calf()
    {
        return $this->belongsTo(calf::class, 'calf_id');
    }

    // protected function date(): Attribute
    // {
    //     // return Attribute::make(
    //     //     get: Carbon::now()->toDateString(),
    //     //     set: Carbon::now()->toDateString()
    //     // );
    // }
}
