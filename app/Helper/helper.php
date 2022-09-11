<?php

use Carbon\Carbon;
use App\Models\Vaccine;
use App\Models\FeedData;
use App\Models\Vaccination;

if (!function_exists('str_ordinal')) {
    /**
     * Append an ordinal indicator to a numeric value.
     *
     * @param  string|int  $value
     * @param  bool  $superscript
     * @return string
     */
    function str_ordinal($value, $superscript = false)
    {
        $number = abs($value);

        $indicators = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];

        $suffix = $superscript ? '<sup>' . $indicators[$number % 10] . '</sup>' : $indicators[$number % 10];
        if ($number % 100 >= 11 && $number % 100 <= 13) {
            $suffix = $superscript ? '<sup>th</sup>' : 'th';
        }

        return number_format($number) . $suffix;
    }
}

function getRoute()
{
    if (auth()->user()->user_type == 1) {
        $user_type = "admin.";
        return $user_type;
    } else if (auth()->user()->user_type == 2) {
        $user_type = "manager.";
        return $user_type;
    } else if (auth()->user()->user_type == 3) {
        $user_type = "staff.";
        return $user_type;
    }
}

function getMiddleware()
{
    if (auth()->user()->user_type == 1) {
        $user_type = "is_admin";
        return $user_type;
    } else if (auth()->user()->user_type == 2) {
        $user_type = "is_manager";
        return $user_type;
    } else if (auth()->user()->user_type == 3) {
        $user_type = "is_staff";
        return $user_type;
    }
}

function feed_done($assign_id, $column,  $cow_id, $table_type, $date)
{
    return FeedData::where([
        [$column, $cow_id],
        ['assign_id', $assign_id],
        ['type', $table_type],
        ['assign_id', $assign_id],
        ['date', $date]
    ])->first();
}

function firstDoseDone($calf_id, $vaccine_id)
{
    $first_dose_vaccine = Vaccination::where([
        ['calf_id', $calf_id],
        ['vaccine_id', $vaccine_id],
    ])->first();
    return $first_dose_vaccine;
}

function getNextDose($calf_id, $vaccine_id)
{
    // $today = Carbon::create("2024-2-06"); // FOR TESTING PURPOSE
    // $date = Carbon::create("2024-2-06"); // FOR TESTING PURPOSE
    // $nextSevenDayDate = $date->addDays(7); // FOR TESTING PURPOSE

    $today = Carbon::today();
    $nextSevenDayDate = Carbon::today()->addDays(7);
    $getNextDose = Vaccination::where([
        ['calf_id', $calf_id],
        ['vaccine_id', $vaccine_id],
    ])->whereBetween('next_date', [$today, $nextSevenDayDate])->orderBy("created_at", "desc")->first();

    return $getNextDose;
}
