<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => ['auth', 'verified', 'organization']], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/posts/{post}/submissions', [PostController::class, 'showSubmissions'])->name('posts.showSubmissions');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::post('/posts/submit', [PostController::class, 'submitPost'])->name('posts.submit');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});


// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
