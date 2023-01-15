<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'active')->group(function(){
    Route::view('/', 'home.index')->name('home');
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');

    Route::get('blog', [BlogController::class, 'index'])->name('blog');
    Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');
    Route::put('blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');
    
    Route::resource('posts/{post}/comments', CommentController::class);
});

Route::middleware('guest')->group(function(){

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login.store', [LoginController::class, 'store'])->name('login.store');

});


