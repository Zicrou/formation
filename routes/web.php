<?php

use App\Http\Controllers\Admin\CourController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\CoursController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('cours', CourController::class)->except(['show']);
    Route::resource('tag', TagController::class)->except(['show']);
});
