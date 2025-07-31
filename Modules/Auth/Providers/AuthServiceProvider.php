<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register bindings or services related to Auth module
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Bootstrapping actions like routes, migrations, views, etc.
    }
}
