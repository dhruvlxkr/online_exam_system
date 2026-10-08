<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;
Use App\Http\Controllers\ExamController;



    Route::get('/register',[AuthController::class,'loadRegister']);
    Route::post('/studentregister',[AuthController::class,'studentRegister'])->name('studentregister');

    Route::get('/login',function(){
        return redirect('/');
    });
    Route::get('/',[AuthController::class,'loadLogin'])->name('login');
    Route::post('/login',[AuthController::class,'userLogin'])->name('userLogin');

    Route::get('/forgot-password',[AuthController::class,'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password',[AuthController::class,'resetPassword'])->name('reset-password');

    Route::get('/reset-password',[AuthController::class,'loadresetpassword'])->name('loadresetpassword');
     Route::post('/reset-password',[AuthController::class,'postresetpassword'])->name('postresetpassword');

    Route::middleware('auth')->group(function(){
        Route::get('/logout',[AuthController::class,'logout']);
     
     Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){
      Route::get('/dashboard',[AuthController::class,'adminDashboard'])->name('dashboard');

    // Subject Routes
      Route::get('/subject',[SubjectController::class,'index'])->name('subject');
      Route::post('/subjectadd', [SubjectController::class,'store'])->name('subject.store');
      Route::post('/subjectupdate', [SubjectController::class,'update'])->name('subject.update');
      Route::post('/subjectdelete', [SubjectController::class,'destroy'])->name('subject.destroy');


      // Exam Routes
      Route::get('/exam',[ExamController::class,'index'])->name('exam');
      Route::post('/examadd', [ExamController::class,'store'])->name('exam.store');
      Route::get('/examdetail/{id}',[ExamController::class,'examDetailsget'])->name('exam.examDetailsget');
      Route::post('/examupdate', [ExamController::class,'update'])->name('exam.update');
      Route::post('/examdelete', [ExamController::class,'destroy'])->name('exam.destroy');
    });


     //Students Routes
    Route::middleware('student')->prefix('student')->name('student.')->group(function(){
    });

    });
    
   
   

    