<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vapid', function () {
    $keys = \Minishlink\WebPush\VAPID::createVapidKeys();
    return $keys;
});
