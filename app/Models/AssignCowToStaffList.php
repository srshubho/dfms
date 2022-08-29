<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCowToStaffList extends Model
{
    use HasFactory;

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
}
