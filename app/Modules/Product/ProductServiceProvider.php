<?php

namespace App\Modules\Product;

use Illuminate\Support\ServiceProvider;
use App\Modules\Product\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Services\ProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'product');

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'product');
    }
}
