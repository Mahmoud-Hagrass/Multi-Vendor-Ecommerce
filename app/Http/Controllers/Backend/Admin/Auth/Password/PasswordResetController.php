<?php

namespace App\Http\Controllers\Backend\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Password\PasswordResetRequest;
use App\Http\Requests\Backend\Admin\Password\StorePasswordRequest;
use App\Models\Admin;
use App\Services\Password\PasswordResetService;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public $otp;
    protected $passwordResetService;

    public function __construct(PasswordResetService $passwordResetService)
    {
        $this->otp = new Otp();
        $this->passwordResetService = $passwordResetService;
    }
    public function passwordReset(PasswordResetRequest $request, $token)
    {
        $otp1 = $this->passwordResetService->passwordReset($request);
        if (!$otp1) {
            return redirect()->back()->with([
                'message' => __('auth.invalid_otp'),
                'alert-type' => 'error',
            ]);
        }
        
        $passwordResetToken = $this->passwordResetService->findResetToken($request->email);

        if ($token != $passwordResetToken) {
            return redirect()->back()->with([
                'message' => __('auth.invalid'),
                'alert-type' => 'error',
            ]);
        }
        return redirect()->route('admin.password.reset-form', ['email' => $request->email, 'token' => $token]);
    }

    public function resetPasswordForm($email, $token)
    {
        return view('backend.admin.auth.password.reset', compact('email', 'token'));
    }

    public function storeNewPassword(StorePasswordRequest $request, $token)
    {
        $admin = $this->passwordResetService->findEmail($request->email, 'admin');
        if (!$admin) {
            return redirect()->back()->with([
                'message' => __('auth.email'),
                'alert-type' => 'error',
            ]);
        }
        $passwordResetToken = $this->passwordResetService->findResetToken($request->email);
        if ($token != $passwordResetToken) {
            return redirect()->back()->with([
                'message' => 'invalid',
                'alert-type' => 'error',
            ]);
        }

        $this->passwordResetService->setNewResetPassword($admin, $request->password);

        return redirect()->route('admin.login')->with([
            'message' => __('auth.password_updated_successfully'),
            'alert-type' => 'success',
        ]);
    }
}
