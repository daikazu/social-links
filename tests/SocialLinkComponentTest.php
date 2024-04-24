<?php

use Illuminate\Support\Facades\Blade;

it('renders the social link for Facebook correctly', function () {
    $view = Blade::render('<x-social-links::social-link platform="facebook" name="user123" icon-styles="size-12 hover:text-red-500 fill-current"/>');

    expect($view)
        ->toContain('https://www.facebook.com/user123', 'class="size-12 hover:text-red-500 fill-current"');
});

it('throws an exception for unsupported platforms', function () {
    Blade::render('<x-social-links::social-link platform="unsupportedPlatform" name="user123" icon-styles="text-blue-500"/>');
})->throws(Exception::class);
