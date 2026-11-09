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

it('uses the display name for the link title and screen reader text', function () {
    $view = Blade::render('<x-social-links::social-link platform="apple_music" name="artist/123"/>');

    expect($view)
        ->toContain('title="Visit us on Apple Music"')
        ->toContain('<span class="sr-only">Apple Music</span>');
});

it('uses the display name for /dev/null', function () {
    $view = Blade::render('<x-social-links::social-link platform="dev_null" name="user123"/>');

    expect($view)
        ->toContain('https://dev-null.sh/@user123')
        ->toContain('title="Visit us on /dev/null"');
});

it('resolves the icon for a mixed-case platform string', function () {
    $view = Blade::render('<x-social-links::social-link platform="GitHub" name="user123" icon-styles="size-6"/>');

    expect($view)
        ->toContain('https://github.com/user123')
        ->toContain('title="Visit us on GitHub"')
        ->toContain('<svg');
});
