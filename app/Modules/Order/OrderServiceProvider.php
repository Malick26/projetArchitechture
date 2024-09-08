<?php
namespace App\Modules\Order;
use App\Modules\Order\Repositories\OrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Modules\Order\Services\OrderRepository;



class OrderServiceProvider extends ServiceProvider{
public function register():void{
    $this->mergeConfigFrom(__DIR__.'/config.php','order');
    $this->app->bind(OrderRepositoryInterface::class,OrderRepository::class);
}
public function boot():void{
    $this->loadRoutesFrom(__DIR__.'/routes.php');
    $this->loadViewsFrom(__DIR__.'/views','order');
}

}

