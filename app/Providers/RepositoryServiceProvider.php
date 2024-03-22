<?php

namespace App\Providers;

use App\Infra\Contracts\BrandInterface;
use App\Infra\Contracts\CustomerInterface;
use App\Infra\Contracts\ProductInputInterface;
use App\Infra\Contracts\ProductInterface;
use App\Infra\Contracts\ProductSaleInterface;
use App\Infra\Contracts\SaleInterface;
use App\Infra\Contracts\ServiceInterface;
use App\Infra\Contracts\ServiceSaleInterface;
use App\Infra\Contracts\UserInterface;
use App\Infra\Repositories\BrandRepository;
use App\Infra\Repositories\CustomerRepository;
use App\Infra\Repositories\ProductInputRepository;
use App\Infra\Repositories\ProductRepository;
use App\Infra\Repositories\ProductSaleRepository;
use App\Infra\Repositories\SaleRepository;
use App\Infra\Repositories\ServiceRepository;
use App\Infra\Repositories\ServiceSaleRepository;
use App\Infra\Repositories\UserRepository;
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
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
        $this->app->bind(SaleInterface::class, SaleRepository::class);
        $this->app->bind(ProductSaleInterface::class, ProductSaleRepository::class);
        $this->app->bind(ServiceSaleInterface::class, ServiceSaleRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }
}
