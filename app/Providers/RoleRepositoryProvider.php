<?php

namespace App\Providers;

use App\Repositories\Impl\RoleRepositoryImpl;
use App\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RoleRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(RoleRepository::class, RoleRepositoryImpl::class);
    }
}
