<?php

namespace App\Http\Controllers\Backend\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Password\PasswordResetRequest;
use App\Http\Requests\Backend\Admin\Password\StorePasswordRequest;
use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public $otp ;

    public function __construct()
    {
        $this->otp = new Otp() ;
    }
    public function passwordReset(PasswordResetRequest $request , $token)
    {
            $otp1 = $this->otp->validate($request->email , $request->otp) ;
            if($otp1->status == false){
                return redirect()->back()->with([
                    'message' => __('auth.invalid_otp') ,
                    'alert-type' => 'error',
                ]);
            }

            $email = DB::table('password_reset_tokens')->where('email' , $request->email)->first() ;
            if($token != $email->token){
                 return redirect()->back()->with([
                    'message' => __('auth.email') ,
                    'alert-type' => 'error',
                ]);
            }
            return redirect()->route('admin.password.reset-form' , ['email'=>$request->email , 'token' => $token]);
    }

    public function resetPasswordForm($email , $token)
    {
        return view('backend.admin.auth.password.reset' , compact('email' , 'token')) ;
    }

    public function storeNewPassword(StorePasswordRequest $request , $token)
    {
        $admin = Admin::where('email' , $request->email)->first() ;
        if(!$admin){
            return redirect()->back()->with([
                'message' => __('auth.email'),
                'alert-type' => 'error',
            ]);
        }
        $admin_email = DB::table('password_reset_tokens')->where('email' , $admin->email)->first() ;
        if($token !== $admin_email->token){
            return redirect()->back()->with([
                    'message' => 'invalid' ,
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
