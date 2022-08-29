<?php

namespace App\Models;

use App\Models\Cow;
use App\Models\Bull;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignCowToStaff extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function assignList()
    {
        return $this->hasMany(AssignCowToStaffList::class, 'assign_id');
    }
}
