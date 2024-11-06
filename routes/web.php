<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/',[AdminController::class,'homepage']);


route::get('/home', [AdminController::class, 'index'])->name('home');
route::get('/post_page', [AdminController::class, 'post_page']);
route::post('/add_post', [AdminController::class, 'add_post']);
Route::get('/edit/{post}', [AdminController::class, 'edit']);
Route::put('/update_post/{post}', [AdminController::class, 'update_post']);
Route::delete('/post/{post}', [AdminController::class, 'destroy']);

