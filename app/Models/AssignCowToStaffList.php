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

    // public function feedData($assign_id, $column, $cow_id, $table_type, $item_id, $date)
    // {
    //     $feedData = FeedData::where([
    //         [$column, $cow_id],
    //         ['assign_id', $assign_id],
    //         ['type', $table_type],
    //         ['item_id', $item_id],
    //     ])->whereDate('date', $date)->first();
    //     return  $feedData;
    // }

    public function feedData($item_id, $cow_id, $type)
    {
        return CowFeedItemAndUnit::where([
            ["feed_item_id", $item_id],
            [$type, $cow_id]
        ])->first();
    }
}
