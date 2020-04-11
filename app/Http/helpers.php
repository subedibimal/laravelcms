<?php

use App\User;

if (!function_exists('get_users')) {
    function get_users()
    {

        $users = User::all();
        if (!empty($users)) {
            return $users;
        } else {
            return "";
        }
    }
}