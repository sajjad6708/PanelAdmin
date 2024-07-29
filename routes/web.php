<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Content\HomeController;
use App\Http\Controllers\Admin\Content\PostController;

Route::get('/', function () {
 
    return view('admin.index');
});
Route::prefix('admin')->group(function(){
Route::get('/' , [DashboardController::class , 'index'])->name('home');
Route::prefix('content')->group(function(){
Route::get('/home' , [HomeController::class , 'index'])->name('home-content');
Route::resource('posts', PostController::class);
});
});

Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::get('/register', [AuthController::class , 'register'])->name('register');
   
