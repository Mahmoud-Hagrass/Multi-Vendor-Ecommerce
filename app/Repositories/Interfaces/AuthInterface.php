<?php

namespace App\Repositories\Interfaces;

interface AuthInterface
{
    public function login($request, $guard) ;
}
