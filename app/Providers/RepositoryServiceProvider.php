<?php

namespace App\Providers;

use App\Repositories\UsersRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\RolesRepository;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UsersRepository::class
        );

        $this->app->bind(
            RoleRepositoryInterface::class,
            RolesRepository::class
        );
    }
}