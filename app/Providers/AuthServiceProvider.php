<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('product-create', function($user){
            if($user->role == 'SuperAdmin' || $user->role == 'Admin'){
                return true;
            }
        });


        Gate::define('product-edit', function($user){
            if($user->role == 'Admin'){
                return true;
            }
        });



        Gate::define('product-show', function($user){
            if($user->role == 'Admin'){
                return true;
            }
        });



        Gate::define('product-delete', function($user){
            if($user->role == 'Admin'){
                return true;
            }
        });
    }
}
