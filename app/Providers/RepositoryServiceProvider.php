<?php

namespace App\Providers;

use App\Infra\Contracts\BrandInterface;
use App\Infra\Contracts\ProductInputInterface;
use App\Infra\Contracts\ProductInterface;
use App\Infra\Contracts\ServiceInterface;
use App\Infra\Repositories\BrandRepository;
use App\Infra\Repositories\ProductInputRepository;
use App\Infra\Repositories\ProductRepository;
use App\Infra\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->bind(BrandInterface::class, BrandRepository::class);
        $this->app->bind(ServiceInterface::class, ServiceRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(ProductInputInterface::class, ProductInputRepository::class);
    }
}
