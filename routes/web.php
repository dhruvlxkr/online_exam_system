<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



    Route::get('/register',[AuthController::class,'loadRegister']);
    Route::post('/studentregister',[AuthController::class,'studentRegister'])->name('studentregister');

    Route::get('/login',function(){
        return redirect('/');
    });
    Route::get('/',[AuthController::class,'loadLogin'])->name('login');
    Route::post('/login',[AuthController::class,'userLogin'])->name('userLogin');

    Route::get('/forgot-password',[AuthController::class,'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password',[AuthController::class,'resetPassword'])->name('reset-password');

    Route::get('/reset-password',[AuthController::class,'loadresetpasword'])->name('loadresetpassword');
     Route::post('/reset-password',[AuthController::class,'postresetpasword'])->name('postresetpassword');

    Route::middleware('auth')->group(function(){
        Route::get('/logout',[AuthController::class,'logout']);
     
     Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){
      Route::get('/dashboard',[AuthController::class,'adminDashboard'])->name('dashboard');
    });

    Route::middleware('student')->prefix('student')->name('student.')->group(function(){
     Route::get('/dashboard',[AuthController::class,'userDashboard'])->name('dashboard');
    });

    });
    
   
   

    