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
        Gate::define('manage-difisy', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('bendahara', $roles) ||
                in_array('dekan', $roles) ||
                in_array('kabag-tu', $roles);
        });

        Gate::define('manage-ebfis', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('admin-ebfis', $roles);
        });

        Gate::define('manage-digilib', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('admin-digilib', $roles);
        });

        Gate::define('manage-diaregsy', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('admin-diaregsy', $roles);
        });

        Gate::define('manage-pedoma', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('admin-pedoma', $roles);
        });

        Gate::define('manage-spmi', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('admin-spmi', $roles);
        });

        Gate::define('manage-oauth', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('dev', $roles);
        });

        Gate::define('manage-user', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('admin-ebfis', $roles) ||
                in_array('dev', $roles);
        });

        Gate::define('manage-role', function ($user) {
            $roles = $this->getArrRoles($user);
            return
                in_array('super-admin', $roles) ||
                in_array('dev', $roles);
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
