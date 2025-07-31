<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
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
