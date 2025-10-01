<?php

use App\Http\Controllers\Backend\Admin\Auth\Password\ForgetPasswordController;
use App\Http\Controllers\Backend\Admin\Auth\Password\PasswordResetController;
use App\Http\Controllers\Backend\Admin\Dashboard\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\Dashboard\Category\CategoryController;
use App\Http\Controllers\Backend\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Admin\Dashboard\Role\RoleController;
use App\Http\Controllers\Backend\Admin\Dashboard\World\WorldController;
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

    ######################        Role Routes      ###################
    Route::resource('/roles', RoleController::class)->middleware('admin')->except('show');
    ###################### End Of Role Routes ###################

    ######################        Admin Routes          ###################
    Route::resource('/admins', AdminController::class)->middleware(['admin'])->except('show');
    Route::prefix('/admins')->controller(AdminController::class)->middleware('admin')->group(function () {
        Route::get('/{id}/change-status' , 'changeStatus')->name('admins.change-status') ;
        Route::get('/inactive' , 'inactiveAdmins')->name('admins.inactive') ;
    }) ;
    ######################      End Of Admin Routes     ###################

    ######################        World Routes          #################
    // Countries Management
    Route::group(['prefix' => '/countries' , 'as' => 'world.' , 'middleware' => ['admin']] , function(){
        Route::controller(WorldController::class)->group(function(){
            Route::get('/' ,  'countries')->name('countries') ;
            Route::get('/{country_id}/change-status' , 'changeCountryStatus')->name('countries.change-status') ;
        }) ;
    }) ;
    // End Of Countries Management


    // Governments Management
    Route::group(['as' => 'world.'] ,function(){
        Route::controller(WorldController::class)->prefix('/governments')->middleware('admin')->group(function(){
            Route::get('/' , 'governments')->name('governments') ;
            Route::post('/change-shipping-price' , 'changeGovernmentShippingPrice')->name('changeGovernmentShippingPrice') ;
            Route::get('/{government_id}/change-status' , 'changeGovernmentStatus')->name('governments.change-status') ;
        }) ;
    }) ;
    // End Of Governments Management

    ######################      End Of World Routes       ##################

    ######################        Category Routes          #################
    Route::group(['as' => 'categories.', 'prefix' => '/categories' , 'controller' => CategoryController::class ,'middleware' => 'admin'] , function(){
        Route::get('/yajra-all' , 'getAllCategoriesDataForYajraTable')->name('yajra.all') ;
        Route::post('/change-status' , 'changeStatus')->name('change-status') ;
    }) ;
    Route::resource('/categories' , CategoryController::class)->except(['create' , 'show' , 'edit'])->middleware('admin') ;
    ######################      End Of Category Routes       ##################



    require __DIR__ . '/adminAuth.php';
});
