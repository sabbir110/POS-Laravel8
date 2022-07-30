<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "<h1>Welcome</h1>";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class, 'view'])->name('user.view');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/create/form', [UserController::class, 'createForm'])->name('user.create.form');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/delete', [UserController::class, 'delete'])->name('user.delete');
});
Route::prefix('Profiles')->group(function () {
    Route::get('/view', [ProfileController::class, 'view'])->name('profiles.view');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::post('/store', [ProfileController::class, 'store'])->name('profiles.store');
});
