<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth', 'active', 'admin')->group(function(){

    Route::redirect('/', 'amin/posts')->name('admin');
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('posts', [PostController::class, 'index'])->name('posts.admin'); 
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create.admin');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store.admin');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show.admin');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit.admin');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update.admin');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy.admin');
    Route::put('posts/{post}/likes', [PostController::class, 'like'])->name('posts.like.admin');
    
});

?>