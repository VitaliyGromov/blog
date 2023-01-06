<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('activeLink')) {

    function activeLink(string $name): string
    {
        return Route::is($name) ? 'active' : '';
    }
}


if(!function_exists('setSessionValue')){

    function setSessionValue(string $key, string $value)
    {
        session([$key => $value]);
    }
}
?>