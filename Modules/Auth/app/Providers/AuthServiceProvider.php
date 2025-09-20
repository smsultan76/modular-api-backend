<?php

namespace Modules\Auth\app\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class AuthServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Auth';

    protected string $nameLower = 'auth';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
 
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {

    }

    /**
     * Register commands in the format of Command::class
     */
}