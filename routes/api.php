<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::group([], module_path('Auth', '/Routes/api.php'));
    Route::group([], module_path('Profile', '/Routes/api.php'));
    Route::group([], module_path('Blog', '/Routes/api.php'));
});