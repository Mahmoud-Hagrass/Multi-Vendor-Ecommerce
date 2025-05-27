<?php

namespace App\Http\Controllers\Backend\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Password\OtpMailRequest;
use App\Models\Admin;
use App\Notifications\SendOtpResetPassword;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('backend.admin.auth.password.email');
    }

    public function sendOtpToEmail(OtpMailRequest $request)
    {
        $admin = Admin::where('email' , $request->email)->first() ;
        if(!$admin){
           Flasher::addError(__('validation.email')) ;
           return redirect()->back();
        }
        $admin->notify(new SendOtpResetPassword()) ;
        return redirect()->route('admin.password.verify-otp' ,  $admin->email) ;
    }

    public function verifyOtpCode($email)
    {
        return view('backend.admin.auth.password.verify' , compact('email')) ;
    }
}
