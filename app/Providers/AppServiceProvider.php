<?php

namespace App\Providers;

use App\Repositories\AddressesRepository;
use App\Repositories\Interfaces\AddressesRepositoryInterface;
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
        $this->app->bind(AddressesRepositoryInterface::class, AddressesRepository::class);
    }
}
