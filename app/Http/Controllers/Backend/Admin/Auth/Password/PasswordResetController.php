<?php

namespace App\Http\Controllers\Backend\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Password\PasswordResetRequest;
use App\Http\Requests\Backend\Admin\Password\StorePasswordRequest;
use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public $otp ;

    public function __construct()
    {
        $this->otp = new Otp() ;
    }
    public function passwordReset(PasswordResetRequest $request)
    {
            $otp1 = $this->otp->validate($request->email , $request->otp) ;
            if($otp1->status == false){
                return redirect()->back()->with([
                    'message' => __('auth.invalid_otp') ,
                    'alert-type' => 'error',
                ]);
            }
            return redirect()->route('admin.password.reset-form' , ['email'=>$request->email]);
    }

    public function resetPasswordForm($email)
    {
        return view('backend.admin.auth.password.reset' , compact('email')) ;
    }

    public function storeNewPassword(StorePasswordRequest $request)
    {
        $admin = Admin::where('email' , $request->email)->first() ;
        if(!$admin){
            return redirect()->back()->with([
                'message' => __('auth.email'),
                'alert-type' => 'error',
            ]);
        }
        $admin->update([
            'password' => Hash::make($request->password) ,
        ]) ;
        return redirect()->route('admin.login')->with([
            'message' => __('auth.password_updated_successfully'),
            'alert-type' => 'success',
        ]);
    }
}
