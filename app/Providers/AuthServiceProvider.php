<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Passport::routes();

        Passport::tokensExpireIn(now()->addDays(1));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonth(6));

        // auth web
        Gate::define('super-admin', function ($user) {
            $roles = $this->getArrRoles($user);
            return in_array('super-admin', $roles);
        });

        Gate::define('dev', function ($user) {
            $roles = $this->getArrRoles($user);
            return in_array('dev', $roles);
        });
    }

    public function getArrRoles($user)
    {
        $roles = [];
        foreach ($user->roles as $value) {
            $roles[] = $value->role;
        }

        return $roles;
    }
}
