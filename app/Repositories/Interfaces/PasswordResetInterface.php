<?php

namespace App\Repositories\Interfaces;

interface PasswordResetInterface
{
    public function findEmail($email, $model);
    public function sendOtpNotification($admin);
    public function storeResetToken($email, $token): string;
    public function passwordReset($request);
    public function findResetToken($email);
    public function setNewResetPassword($admin , $password);
}
