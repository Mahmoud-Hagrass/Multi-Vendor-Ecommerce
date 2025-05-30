<?php

namespace App\Repositories\Auth;

use App\Repositories\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function login($request, $guard)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::guard($guard)->attempt($credentials, $request->boolean('remember'))) {
            return false;
        }

        $request->session()->regenerate();
        return true;
    }
}
