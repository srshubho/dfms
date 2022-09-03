<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\AssignTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignCowToStaff extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function assignLists()
    {
        return $this->hasMany(AssignCowToStaffList::class, 'assign_id');
    }

    public function assignedTask()
    {
        return $this->hasmany(AssignTask::class);
    }

    public function getTime($assign_id, $cow_id, $column, $type)
    {
        $today_date = Carbon::now()->toDateString();
        return AssignTask::where([
            [$column, $cow_id],
            ['type', $type],
            ['assign_id', $assign_id],
            ['date', $today_date]
        ])->first();
    }
}
