<?php

namespace App\Providers;

use App\Repositories\Admin\AdminRepository;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Interfaces\AdminInterface;
use App\Repositories\Interfaces\AuthInterface;
use App\Repositories\Interfaces\PasswordResetInterface;
use App\Repositories\Interfaces\RoleInterface;
use App\Repositories\Interfaces\WorldInterface;
use App\Repositories\password\PasswordResetRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\World\WorldRepository;
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
        $this->app->bind(RoleInterface::class , RoleRepository::class) ;
        $this->app->bind(AdminInterface::class , AdminRepository::class) ;
        $this->app->bind(WorldInterface::class , WorldRepository::class) ;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
