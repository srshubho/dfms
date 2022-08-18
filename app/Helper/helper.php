<?php


function getRoute()
{
    if (auth()->user()->user_type == 1) {
        $user_type = "admin";
        return $user_type;
    } else if (auth()->user()->user_type == 2) {
        $user_type = "manager";
        return $user_type;
    } else if (auth()->user()->user_type == 3) {
        $user_type = "staff";
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
