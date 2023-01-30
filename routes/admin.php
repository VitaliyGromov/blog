<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth', 'active', 'role:admin')->group(function(){

    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    
});

?>