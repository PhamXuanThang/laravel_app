<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\Contracts\ProductRepositoryInterface;
use App\Repository\Contracts\RepositoryInterface;
use App\Repository\Contracts\RoleRepositoryInterface;
use App\Repository\Contracts\UserRepositoryInterface;
use App\Repository\ProductRepository;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\RoleServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\ProductService;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singletonIf(ProductServiceInterface::class, ProductService::class);
        $this->app->singletonIf(UserServiceInterface::class, UserService::class);
        $this->app->singletonIf(RoleServiceInterface::class, RoleService::class);

        $this->app->singletonIf(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singletonIf(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singletonIf(RoleRepositoryInterface::class, RoleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
