<?php

use Daikazu\SocialLinks\Enums\SocialNetwork;

it('returns the correct URL for Facebook using enum', function () {
    expect(social_url(SocialNetwork::FACEBOOK, 'user123'))->toBe('https://www.facebook.com/user123');
});

it('returns the correct URL for Twitter using enum', function () {
    expect(social_url(SocialNetwork::TWITTER, 'user123'))->toBe('https://x.com/user123');
});

it('returns the correct URL for Instagram using enum', function () {
    expect(social_url(SocialNetwork::INSTAGRAM, 'user123'))->toBe('https://www.instagram.com/user123');
});

it('can get URL directly from enum', function () {
    expect(SocialNetwork::LINKEDIN->getUrl('user123'))->toBe('https://www.linkedin.com/in/user123');
});

it('renders the social link component with enum correctly', function () {
    $view = Illuminate\Support\Facades\Blade::render('<x-social-links::social-link :platform="$platform" name="user123" icon-styles="size-12"/>', [
        'platform' => SocialNetwork::FACEBOOK,
    ]);

    expect($view)
        ->toContain('https://www.facebook.com/user123')
        ->toContain('Visit us on Facebook')
        ->toContain('class="size-12"');
});
