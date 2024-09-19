<?php

namespace App\Providers;

use App\Repositories\RoleRepository;
use App\Repositories\CourtRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PermissionRepository;
use App\Interfaces\RoleRepositoryInterface;
use App\Repositories\GovernorateRepository;
use App\Repositories\NationalityRepository;
use App\Interfaces\CourtRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\GovernorateRepositoryInterface;
use App\Interfaces\NationalityRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NationalityRepositoryInterface::class, NationalityRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(GovernorateRepositoryInterface::class, GovernorateRepository::class);
        $this->app->bind(CourtRepositoryInterface::class, CourtRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
