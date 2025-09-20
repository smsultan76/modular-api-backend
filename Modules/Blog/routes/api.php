<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\PostController;

Route::apiResource('posts', PostController::class)->except(['edit', 'create']);