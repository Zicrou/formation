<?php

use App\Http\Controllers\Admin\CourController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
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

Route::post('cours/likes/{courId}', [App\Http\Controllers\CourController::class,'likeCour'])->name('likes.cours')->where([
    'courId' => $idRegex,
]);

// Route::post('/cours/likes/{courId}', [\App\Http\Controllers\CourController::class, 'likeCour'])->name('like.cour')->where([
//     'courId' => $idRegex,
// ]);

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function(){
    Route::resource('cours', CourController::class)->except(['show']);
    Route::resource('tag', TagController::class)->except(['show']);
});


Route::get('/user/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index')->middleware(['auth']);

Route::get('dashboards', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/stripe', [StripeController::class, 'stripe'])->name('stripe.index');
Route::get('stripe/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('stripe/checkout/success', [StripeController::class, 'success'])->name('stripe.checkout.success');

require __DIR__.'/auth.php';
