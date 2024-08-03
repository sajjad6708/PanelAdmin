<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\ApiPostController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){

 Route::apiResource('api-posts', ApiPostController::class) ;
    // Route::get('/posts' ,[ApiPostController::class , 'index'])->name('index') ;
    // Route::post('/posts' ,[ApiPostController::class , 'store'])->name('store') ;
    

});


