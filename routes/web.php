<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create']);

Route::get('/about', [AboutController::class, 'index'])->name('about.index');