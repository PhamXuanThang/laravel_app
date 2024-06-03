<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\Contracts\ProductRepositoryInterface;
use App\Repository\Contracts\RepositoryInterface;
use App\Repository\ProductRepository;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singletonIf(ProductServiceInterface::class, ProductService::class);

        $this->app->singletonIf(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
