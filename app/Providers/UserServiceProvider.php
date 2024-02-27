<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserServiceInterface;
use app\Services\UserService;

class UserServiceProvider extends ServiceProvider
{

    public $bindings = [
        ServerProvider::class => DigitalOceanServerProvider::class,
        UserService::class => UserServiceInterface::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */


    public function register()
    {
        // $this->app->bind(UserServiceInterface::class, ServiceProvider::class);

        $this->app::bind(
            'App\Repositories\UserRepository',
            'App\Repositories\UserRepositoryInterface');

        $this->app::bind(
            'App\Services\UserService',
            'App\Services\Repositories\UserServiceInterface');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
