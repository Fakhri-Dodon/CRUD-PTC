<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('/book')->name('book.')->group(function() {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/store', [BookController::class, 'store'])->name('store');
    Route::get('/{id}', [BookController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [BookController::class, 'update'])->name('update');
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('delete');
});

Route::get('/bookUser', [BookUserController::class, 'index'])->name('book.user');

Route::prefix('/user')->name('user.')->group(function() {
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserCOntroller::class, 'destroy'])->name('delete');
});