<?php

namespace App\Providers;

use App\Infra\Contracts\BrandInterface;
use App\Infra\Repositories\BrandRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->bind(BrandInterface::class, BrandRepository::class);
    }
}
