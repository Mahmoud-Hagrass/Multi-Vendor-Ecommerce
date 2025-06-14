<?php

use App\Http\Controllers\Backend\Admin\Auth\Password\ForgetPasswordController;
use App\Http\Controllers\Backend\Admin\Auth\Password\PasswordResetController;
use App\Http\Controllers\Backend\Admin\Dashboard\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Admin\Dashboard\Role\RoleController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('index');
    ###################### Forget Password Routes #######################
    Route::prefix('/password')->controller(ForgetPasswordController::class)->name('password.')->group(function () {
        Route::get('/email', 'showForgetPasswordForm')->name('email');
        Route::post('/verify', 'sendOtpToEmail')->name('verify');
        Route::get('/verify/{email}/otp/{token}',  'verifyOtpCode')->name('verify-otp');
    });
    ###################### End Of Forget Password Routes ##################

    ###################### Reset Password Routes ##########################
    Route::prefix('/password')->controller(PasswordResetController::class)->name('password.')->group(function () {
        Route::post('/reset/{token}',  'passwordReset')->name('reset');
        Route::get('/reset/form/{email}/{token}', 'resetPasswordForm')->name('reset-form');
        Route::post('/store/{token}',  'storeNewPassword')->name('store');
    });

    ###################### End Of Reset Password Routes ###################
    Route::resource('/roles', RoleController::class)->middleware('admin')->except('show');
    ###################### End Of Reset Password Routes ###################

    ######################        Admin Routes          ###################
    Route::resource('/admins', AdminController::class)->middleware(['admin'])->except('show');
    Route::prefix('/admins')->controller(AdminController::class)->middleware('admin')->group(function () {
        Route::get('/{id}/change-status' , 'changeStatus')->name('admins.change-status') ;
        Route::get('/inactive' , 'inactiveAdmins')->name('admins.inactive') ;
    }) ;
    ######################      End Of Admin Routes     ###################



    require __DIR__ . '/adminAuth.php';
});
