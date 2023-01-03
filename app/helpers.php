<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('activeLink')) {

    function activeLink(string $name): string
    {
        return Route::is($name) ? 'active' : '';
    }
}
?>