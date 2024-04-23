<?php

// tests/HelpersTest.php

it('returns the correct URL for Facebook', function () {
    expect(social_url('facebook', 'user123'))->toBe('https://www.facebook.com/user123');
});

it('returns the correct URL for Twitter', function () {
    expect(social_url('twitter', 'user123'))->toBe('https://x.com/user123');
});

it('returns the correct URL for Instagram', function () {
    expect(social_url('instagram', 'user123'))->toBe('https://www.instagram.com/user123');
});

it('returns the correct URL for LinkedIn', function () {
    expect(social_url('linkedin', 'user123'))->toBe('https://www.linkedin.com/in/user123');
});

it('returns the correct URL for YouTube', function () {
    expect(social_url('youtube', 'user123'))->toBe('https://www.youtube.com/user/user123');
});

it('returns the correct URL for pinterest', function () {
    expect(social_url('pinterest', 'user123'))->toBe('https://www.pinterest.com/user123');
});

it('returns the correct URL for tiktok', function () {
    expect(social_url('tiktok', 'user123'))->toBe('https://www.tiktok.com/@user123');
});

it('returns the correct URL for snapchat', function () {
    expect(social_url('snapchat', 'user123'))->toBe('https://www.snapchat.com/add/user123');
});

it('returns the correct URL for reddit', function () {
    expect(social_url('reddit', 'user123'))->toBe('https://www.reddit.com/user/user123');
});

it('returns the correct URL for yelp', function () {
    expect(social_url('yelp', 'user123'))->toBe('https://www.yelp.com/user_details?userid=user123');
});

it('returns the correct URL for whatsapp', function () {
    expect(social_url('whatsapp', 'user123'))->toBe('https://wa.me/user123');
});

it('returns the correct URL for telegram', function () {
    expect(social_url('telegram', 'user123'))->toBe('https://t.me/user123');
});

it('returns the correct URL for github', function () {
    expect(social_url('github', 'user123'))->toBe('https://github.com/user123');
});

it('returns the correct URL for discord', function () {
    expect(social_url('discord', 'user123'))->toBe('https://discordapp.com/users/user123');
});

it('returns null for unsupported platforms', function () {
    social_url('unknown', 'user123');
})->throws(Exception::class, 'Social media network not currently supported.');
