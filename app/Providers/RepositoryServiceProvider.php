<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Categories\categoriesRepository;
use App\Interface\Categories\categoriesRepositoryInterface;
use App\Interface\Products\ProductsRepositoryInterface;
use App\Interface\Stores\StoresRepositoryInterface;
use App\Repository\Products\ProductsRepository;
use App\Repository\Stores\StoresRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(categoriesRepositoryInterface::class,categoriesRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class,ProductsRepository::class);
        $this->app->bind(StoresRepositoryInterface::class,StoresRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
