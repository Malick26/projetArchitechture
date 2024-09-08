<?php
namespace App\Modules\Users;
use App\Modules\Users\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Modules\Users\Services\UserRepository;



class UserServiceProvider extends ServiceProvider{
public function register():void{
    $this->mergeConfigFrom(__DIR__.'/config.php','user');
    $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
}
public function boot():void{
    $this->loadRoutesFrom(__DIR__.'/routes.php');
    $this->loadViewsFrom(__DIR__.'/views','user');
}

}

