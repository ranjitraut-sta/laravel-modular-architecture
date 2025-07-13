<?php

namespace App\Modules\UserManagement\Providers;

use App\Modules\UserManagement\Repositories\Implementations\PermissionRepository;
use App\Modules\UserManagement\Repositories\Implementations\RoleHasPermissionRepository;
use App\Modules\UserManagement\Repositories\Implementations\RoleRepository;
use App\Modules\UserManagement\Repositories\Implementations\UserRepository;
use App\Modules\UserManagement\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Modules\UserManagement\Repositories\Interfaces\RoleHasPermissionRepositoryInterface;
use App\Modules\UserManagement\Repositories\Interfaces\RoleRepositoryInterface;
use App\Modules\UserManagement\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class UserManagementServiceProvider extends ServiceProvider
{
    public function register()
    {
        //binding repository
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleHasPermissionRepositoryInterface::class, RoleHasPermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        //binding service

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'UserManagement');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
