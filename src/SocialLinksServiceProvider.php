<?php

namespace Daikazu\SocialLinks;

use Closure;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialLinksServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('social-links')
            ->hasViews();
    }

    public function booted(Closure $callback)
    {
        Blade::component('social-link::social-link', 'social-link');
    }
}
