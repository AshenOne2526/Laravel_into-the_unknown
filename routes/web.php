<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController; 

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('posts')->name('post.')->group(function(){
    Route::get('/', IndexController::class)->name('index');
    Route::get('/create', CreateController::class)->name('create');
    Route::post('/', StoreController::class)->name('store');
    Route::get('/{post}', ShowController::class)->name('show');
    Route::get('/{post}/edit', EditController::class)->name('edit');
    Route::patch('/{post}', UpdateController::class)->name('update');
    Route::delete('/{post}', DestroyController::class)->name('delete');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('post')->name('post.')->group(function(){
        Route::get('/', AdminPostIndexController::class)->name('index');
    });    
});  

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');