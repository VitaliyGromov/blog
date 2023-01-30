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
    Route::get('blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit')->middleware('permission:edit posts');
    Route::put('blog/{post}', [BlogController::class, 'update'])->name('blog.update')->middleware('permission:edit posts');;
    Route::delete('blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware('permission:delete posts');;
    
    Route::resource('posts/{post}/comments', CommentController::class);
});

Route::middleware('guest')->group(function(){

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login.store', [LoginController::class, 'store'])->name('login.store');

});