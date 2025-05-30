<?php

namespace App\Http\Controllers\Backend\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Password\OtpMailRequest;
use App\Models\Admin;
use App\Notifications\SendOtpResetPassword;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            return redirect()->back()->with([
                     'message' => __('validation.email') ,
                     'alert-type' => 'error' ,
            ]) ;
        }

        $token = Str::random(64);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $admin->email],
            ['token' => $token, 'created_at' => now()]
        );
        $admin->notify(new SendOtpResetPassword()) ;
        return redirect()->route('admin.password.verify-otp' , [ 'email' => $admin->email , 'token' => $token]) ;
    }

    public function verifyOtpCode($email , $token)
    {
        return view('backend.admin.auth.password.verify' , compact('email' , 'token')) ;
    }
}
