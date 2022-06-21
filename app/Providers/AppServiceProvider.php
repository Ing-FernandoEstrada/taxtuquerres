<?php

namespace App\Providers;

use App\Actions\Admin\UserManager;
use App\Contracts\ManagesUsers;
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
    }
}
