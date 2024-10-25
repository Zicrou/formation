<?php

use App\Http\Controllers\Admin\CourController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
Route::get('/', [HomeController::class, 'index']);
Route::get('/cours', [App\Http\Controllers\CourController::class, 'index'])->name('cour.index');
Route::get('/cours/{slug}-{cour}', [App\Http\Controllers\CourController::class, 'show'])->name('cour.show')->where([
    'cour' => $idRegex,
    'slug' => $slugRegex,
]);

Route::post('/cours/{cour}/contact', [\App\Http\Controllers\CourController::class, 'contact'])->name('cour.contact')->where([
    'cour' => $idRegex,
]);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('cours', CourController::class)->except(['show']);
    Route::resource('tag', TagController::class)->except(['show']);
});
