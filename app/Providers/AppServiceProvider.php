<?php

namespace App\Providers;

use App\Actions\Admin\{BrandManager, CategoryManager, HeadquarterManager, TicketManager, UserManager, VehicleManager};
use App\Contracts\{ManagesBrands,
    ManagesCategories,
    ManagesHeadquarters,
    ManagesTickets,
    ManagesUsers,
    ManagesVehicles};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->singleton(ManagesUsers::class,UserManager::class);
        $this->app->singleton(ManagesVehicles::class,VehicleManager::class);
        $this->app->singleton(ManagesBrands::class,BrandManager::class);
        $this->app->singleton(ManagesCategories::class,CategoryManager::class);
        $this->app->singleton(ManagesTickets::class,TicketManager::class);
        $this->app->singleton(ManagesHeadquarters::class,HeadquarterManager::class);
    }
}
