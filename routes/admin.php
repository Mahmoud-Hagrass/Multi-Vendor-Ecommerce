<?php

use App\Http\Controllers\Backend\Admin\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'],function(){
    Route::get('/dashboard', [DashboardController::class , 'index'])->middleware('admin')->name('index');
    require __DIR__.'/adminAuth.php';
}); 

