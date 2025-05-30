<?php

namespace App\Services\Auth;

use App\Repositories\Interfaces\AuthInterface;

class AuthService
{
    /**
     * Create a new class instance.
     */
    protected $authRepository ;

    public function __construct(AuthInterface $auth_interface)
    {
        $this->authRepository = $auth_interface;
    }

    public function login($request , $guard)
    {
        $loggedin = $this->authRepository->login($request , $guard);
        if(!$loggedin) {
            return false ;
        }
        return true ;
    }
}
