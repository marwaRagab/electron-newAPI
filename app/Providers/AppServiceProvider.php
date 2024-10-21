<?php

namespace App\Providers;

use App\Models\Boker;
use App\Models\Branch;
use App\Repositories\BankRepository;
use App\Repositories\RoleRepository;
use App\Repositories\BokerRepository;
use App\Repositories\CourtRepository;
use App\Repositories\BranchRepository;
use App\Repositories\RegionRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\MinistryRepository;
use App\Repositories\PermissionRepository;
use App\Interfaces\BankRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Repositories\GovernorateRepository;
use App\Repositories\NationalityRepository;
use App\Interfaces\BokerRepositoryInterface;
use App\Interfaces\CourtRepositoryInterface;
use App\Interfaces\BranchRepositoryInterface;
use App\Interfaces\RegionRepositoryInterface;
use App\Repositories\PoliceStationRepository;
use App\Interfaces\MinistryRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\GovernorateRepositoryInterface;
use App\Interfaces\NationalityRepositoryInterface;
use App\Repositories\CommuncationMethodRepository;
use App\Repositories\MinistryPercentageRepository;
use App\Interfaces\PoliceStationRepositoryInterface;
use App\Repositories\InstallmentPercentageRepository;
use App\Repositories\TransactionsCompletedRepository;
use App\Interfaces\CommuncationMethodRepositoryInterface;
use App\Interfaces\MinistryPercentageRepositoryInterface;
use App\Interfaces\InstallmentPercentageRepositoryInterface;
use App\Interfaces\TransactionsCompletedRepositoryInterface;

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
        $this->app->bind(BankRepositoryInterface::class, BankRepository::class);
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        $this->app->bind(PoliceStationRepositoryInterface::class, PoliceStationRepository::class);
        $this->app->bind(RegionRepositoryInterface::class, RegionRepository::class);
        $this->app->bind(InstallmentPercentageRepositoryInterface::class, InstallmentPercentageRepository::class);
        $this->app->bind(MinistryPercentageRepositoryInterface::class, MinistryPercentageRepository::class);
        $this->app->bind(MinistryRepositoryInterface::class, MinistryRepository::class);
        $this->app->bind(BokerRepositoryInterface::class, BokerRepository::class);
        $this->app->bind(CommuncationMethodRepositoryInterface::class, CommuncationMethodRepository::class);
        $this->app->bind(TransactionsCompletedRepositoryInterface::class, TransactionsCompletedRepository::class);

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
