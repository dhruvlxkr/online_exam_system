<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



    Route::get('/register',[AuthController::class,'loadRegister']);
    Route::post('/studentregister',[AuthController::class,'studentRegister'])->name('studentregister');

    Route::get('/login',function(){
        return redirect('/');
    });
    Route::get('/',[AuthController::class,'loadLogin']);
    Route::post('/login',[AuthController::class,'userLogin'])->name('userLogin');

    Route::get('/logout',[AuthController::class,'logout']);

    Route::get('/admin/dashboard',[AuthController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/student/dashboard',[AuthController::class,'userDashboard'])->name('student.dashboard');

    