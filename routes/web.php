<?php

use App\Http\Controllers\GoogleProviderController;
use App\Http\Controllers\intellify\CodeGeneratorController;
use App\Http\Controllers\intellify\HistoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app.pages.landing_page');
})->name('index');

Route::middleware('guest')->group(function () {
   Route::get('/auth/google/redirect', [GoogleProviderController::class, 'redirect'])->name('auth.redirect');
   Route::get('/auth/google/callback', [GoogleProviderController::class, 'callback'])->name('auth.callback');
});


Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/usage-history', [HistoryController::class, 'index'])->name('history.index');

    Route::get('/code-generator', [CodeGeneratorController::class, 'index'])->name('code_generator.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';