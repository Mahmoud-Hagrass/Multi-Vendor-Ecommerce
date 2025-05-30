<?php

use App\Http\Controllers\Backend\Admin\Auth\Password\ForgetPasswordController;
use App\Http\Controllers\Backend\Admin\Auth\Password\PasswordResetController;
use App\Http\Controllers\Backend\Admin\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.'],function(){
    Route::get('/dashboard', [DashboardController::class , 'index'])->middleware('admin')->name('index');
         ###################### Forget Password Routes #######################
    Route::prefix('/password')->controller(ForgetPasswordController::class)->name('password.')->group(function(){
        Route::get('/email' , 'showForgetPasswordForm')->name('email') ;
        Route::post('/verify' , 'sendOtpToEmail')->name('verify') ;
        Route::get('/verify/{email}/otp/{token}' ,  'verifyOtpCode')->name('verify-otp') ;
    }) ;

        ###################### Reset Password Routes #########################
    Route::prefix('/password')->controller(PasswordResetController::class)->name('password.')->group(function(){
        Route::post('/reset/{token}' ,  'passwordReset')->name('reset') ;
        Route::get('/reset/form/{email}/{token}' , 'resetPasswordForm')->name('reset-form') ;
        Route::post('/store/{token}' ,  'storeNewPassword')->name('store') ;
    });

    require __DIR__.'/adminAuth.php';
});

