<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach (File::directories(app_path('Modules')) as $module) {
            $moduleName = basename($module);
            $provider = "App\\Modules\\{$moduleName}\\Providers\\{$moduleName}ServiceProvider";

            if (class_exists($provider)) {
                $this->app->register($provider);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
