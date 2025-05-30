<?php

namespace App\Repositories\password;

use App\Models\Admin;
use App\Notifications\SendOtpResetPassword;
use App\Repositories\Interfaces\PasswordResetInterface;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetRepository implements PasswordResetInterface
{
    /**
     * Create a new class instance.
     */

    protected $otp ;

    public function __construct()
    {
        $this->otp = new Otp() ;
    }

    public function findEmail($email, $model)
    {
        if ($model == 'admin') {
            $admin = Admin::where('email', $email)->first();
            if (!$admin) {
                return false;
            }
            return $admin ;
        }
    }

    public function sendOtpNotification($admin)
    {
        $admin->notify(new SendOtpResetPassword());
    }

    public function storeResetToken($email , $token): string
    {
        $inserted = DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $token , 'created_at' => now()],
        );
        if(!$inserted){
            return false ;
        }
        return $token ;
    }

    public function passwordReset($request)
    {
        $result = $this->otp->validate($request->email , $request->otp) ;
        if($result->status == false){
            return false ;
        }
        return $request->otp ;
    }

    public function findResetToken($email)
    {
        $email = DB::table('password_reset_tokens')->where('email', $email)->first();
        if(!$email){
            return false ;
        }
        return $email->token ;
    }

    public function setNewResetPassword($admin , $password)
    {
        $admin->update([
            'password' => Hash::make($password),
        ]);
    }
}
