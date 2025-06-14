<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthorizationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        foreach(config('permissions_en.permissions') as $key => $permission){
            Gate::define($key , function($auth) use($key){
                    return $auth->hasPermission($key);
              });
        }
    }
}
