<?php

namespace App\Http\Controllers\Backend\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Password\OtpMailRequest;
use App\Models\Admin;
use App\Notifications\SendOtpResetPassword;
use App\Services\Password\PasswordResetService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    protected $passwordResetService ;

    public function __construct(PasswordResetService $passwordResetService)
    {
        $this->passwordResetService = $passwordResetService ;
    }
    public function showForgetPasswordForm()
    {
        return view('backend.admin.auth.password.email');
    }

    public function sendOtpToEmail(OtpMailRequest $request)
    {
        $admin = $this->passwordResetService->findEmail($request->email , 'admin') ;
        if(!$admin){
            return redirect()->back()->with([
                     'message' => __('validation.email') ,
                     'alert-type' => 'error' ,
            ]) ;
        }
        // send otp notification to admin email address
        $this->passwordResetService->sendOtpNotification($admin) ;
        // creat reset token for this admin
        $token = Str::random(64);
        // save the token in database
        $token = $this->passwordResetService->storeResetToken($admin->email , $token) ;
        return redirect()->route('admin.password.verify-otp' , [ 'email' => $admin->email , 'token' => $token]) ;
    }

    public function verifyOtpCode($email , $token)
    {
        return view('backend.admin.auth.password.verify' , compact('email' , 'token')) ;
    }
}
