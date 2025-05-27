<?php

use App\Http\Controllers\Backend\Admin\Auth\Password\ForgetPasswordController;
use App\Http\Controllers\Backend\Admin\Auth\Password\PasswordResetController;
use App\Http\Controllers\Backend\Admin\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.'],function(){
    Route::get('/dashboard', [DashboardController::class , 'index'])->middleware('admin')->name('index');
    Route::get('/password/email' , [ForgetPasswordController::class,'showForgetPasswordForm'])->name('password.email') ;
    Route::post('/password/verify' , [ForgetPasswordController::class, 'sendOtpToEmail'])->name('password.verify') ;
    Route::get('/password/verify/{email}/otp' , [ForgetPasswordController::class, 'verifyOtpCode'])->name('password.verify-otp') ;
    Route::post('/password/reset' , [PasswordResetController::class, 'passwordReset'])->name('password.reset') ;
    Route::get('/password/reset/form/{email}' , [PasswordResetController::class , 'resetPasswordForm'])->name('password.reset-form') ;
    Route::post('/password/store' , [PasswordResetController::class , 'storeNewPassword'])->name('password.store') ;
    require __DIR__.'/adminAuth.php';
});

