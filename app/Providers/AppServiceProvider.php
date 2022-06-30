<?php

namespace App\Providers;

use App\Actions\Admin\BrandManager;
use App\Actions\Admin\CategoryManager;
use App\Actions\Admin\UserManager;
use App\Actions\Admin\VehicleManager;
use App\Contracts\ManagesBrands;
use App\Contracts\ManagesCategories;
use App\Contracts\ManagesUsers;
use App\Contracts\ManagesVehicles;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(ManagesUsers::class,UserManager::class);
        $this->app->singleton(ManagesVehicles::class,VehicleManager::class);
        $this->app->singleton(ManagesBrands::class,BrandManager::class);
        $this->app->singleton(ManagesCategories::class,CategoryManager::class);
    }
}
