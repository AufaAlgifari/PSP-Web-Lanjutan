<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/',[AdminController::class,'homepage']);


route::get('/home', [AdminController::class, 'index'])->name('home');
route::get('/post_page', [AdminController::class, 'post_page'])->name('home');
route::post('/add_post', [AdminController::class, 'add_post'])->name('home');
