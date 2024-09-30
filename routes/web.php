<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CorrectionController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class);
Route::get('/posts/{post}/corrections/create', [CorrectionController::class, 'create'])->name('corrections.create');
Route::post('/posts/{post}/corrections', [CorrectionController::class, 'store'])->name('corrections.store');
Route::get('/corrections/{correction}', [CorrectionController::class, 'show'])->name('corrections.show');
Route::delete('/corrections/{correction}', [CorrectionController::class, 'destroy'])->name('corrections.destroy');

require __DIR__.'/auth.php';
