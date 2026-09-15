<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


    Route::get('/register',[AuthController::class,'loadRegister']);
    Route::post('/studentregister',[AuthController::class,'studentRegister'])->name('studentregister');

    Route::get('')
    Route::get('/',[AuthController::class,'loadLogin']);
    Route::post('/studentlogin',[AuthController::class,'userLogin'])->name('userLogin');