<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Content\HomeController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\EmailController;

Route::get('/', function () {
 
    return view('admin.index');
});
Route::prefix('admin')->group(function(){
Route::get('/' , [DashboardController::class , 'index'])->name('home');
Route::get('email', [EmailController::class , 'index'])->name('email.index');
Route::get('email-create' , [EmailController::class , 'create'])->name('email.create');
Route::post('email-store/' , [EmailController::class , 'store'])->name('email.store');
Route::get('email-send/{email}' , [EmailController::class , 'send'])->name('email.send');


Route::prefix('content')->group(function(){
Route::get('/home' , [HomeController::class , 'index'])->name('home-content');
Route::resource('posts', PostController::class);
});
});

Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::get('/register', [AuthController::class , 'register'])->name('register');
   
