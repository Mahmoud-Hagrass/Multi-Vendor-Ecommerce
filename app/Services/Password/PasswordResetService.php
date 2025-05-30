<?php

namespace App\Services\Password;

use App\Notifications\SendOtpResetPassword;
use App\Repositories\Interfaces\PasswordResetInterface;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetService
{
    /**
     * Create a new class instance.
     */
    protected $passwordResetRepository ;

    public function __construct(PasswordResetInterface $passwordResetRepository)
    {
        $this->passwordResetRepository = $passwordResetRepository ;
    }

    public function findEmail($email , $model)
    {
       return $this->passwordResetRepository->findEmail($email , $model) ;
    }

    public function sendOtpNotification($admin)
    {
        return $this->passwordResetRepository->sendOtpNotification($admin) ;
    }

    public function storeResetToken($email , $token)
    {
        return $this->passwordResetRepository->storeResetToken($email , $token) ;
    }

    public function passwordReset($request)
    {
        return $this->passwordResetRepository->passwordReset($request) ;
    }

    public function findResetToken($email)
    {
        return $this->passwordResetRepository->findResetToken($email);
    }

    public function setNewResetPassword($admin , $password)
    {
        return $this->passwordResetRepository->setNewResetPassword($admin , $password);
    }
}
