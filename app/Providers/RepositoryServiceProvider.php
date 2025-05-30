<?php

namespace App\Providers;

use App\Repositories\Auth\AuthRepository;
use App\Repositories\Interfaces\AuthInterface;
use App\Repositories\Interfaces\PasswordResetInterface;
use App\Repositories\password\PasswordResetRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class , AuthRepository::class) ;
        $this->app->bind(PasswordResetInterface::class , PasswordResetRepository::class) ;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
