<?php

// tests/HelpersTest.php

it('returns the correct URL for Facebook', function () {
    expect(social_url('facebook', 'user123'))->toBe('https://www.facebook.com/user123');
});

it('returns the correct URL for Twitter', function () {
    expect(social_url('twitter', 'user123'))->toBe('https://x.com/user123');
});

it('returns the correct URL for X', function () {
    expect(social_url('x', 'user123'))->toBe('https://x.com/user123');
});

it('returns the correct URL for Instagram', function () {
    expect(social_url('instagram', 'user123'))->toBe('https://www.instagram.com/user123');
});

it('returns the correct URL for LinkedIn', function () {
    expect(social_url('linkedin', 'user123'))->toBe('https://www.linkedin.com/in/user123');
});

it('returns the correct URL for YouTube', function () {
    expect(social_url('youtube', 'user123'))->toBe('https://www.youtube.com/@user123');
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

it('returns the correct URL for address', function () {
    expect(social_url('address', '123 Main St'))->toBe('123 Main St');
});

it('returns the correct URL for apple_music', function () {
    expect(social_url('apple_music', 'artist/123'))->toBe('https://music.apple.com/artist/123');
});

it('returns the correct URL for bandcamp', function () {
    expect(social_url('bandcamp', 'artistname'))->toBe('https://artistname.bandcamp.com');
});

it('returns the correct URL for booking', function () {
    expect(social_url('booking', 'https://booking.com/profile'))->toBe('https://booking.com/profile');
});

it('returns the correct URL for buy_merch', function () {
    expect(social_url('buy_merch', 'https://store.com'))->toBe('https://store.com');
});

it('returns the correct URL for contact_form', function () {
    expect(social_url('contact_form', 'https://example.com/contact'))->toBe('https://example.com/contact');
});

it('returns the correct URL for donate', function () {
    expect(social_url('donate', 'https://donate.com/me'))->toBe('https://donate.com/me');
});

it('returns the correct URL for email', function () {
    expect(social_url('email', 'user@example.com'))->toBe('mailto:user@example.com');
});

it('returns the correct URL for google_play', function () {
    expect(social_url('google_play', 'artist123'))->toBe('https://play.google.com/store/music/artist?id=artist123');
});

it('returns the correct URL for other', function () {
    expect(social_url('other', 'https://other.com'))->toBe('https://other.com');
});

it('returns the correct URL for patreon', function () {
    expect(social_url('patreon', 'creator'))->toBe('https://www.patreon.com/creator');
});

it('returns the correct URL for phone', function () {
    expect(social_url('phone', '+1234567890'))->toBe('tel:+1234567890');
});

it('returns the correct URL for soundcloud', function () {
    expect(social_url('soundcloud', 'artist'))->toBe('https://soundcloud.com/artist');
});

it('returns the correct URL for spotify', function () {
    expect(social_url('spotify', '123456'))->toBe('https://open.spotify.com/artist/123456');
});

it('returns the correct URL for stream', function () {
    expect(social_url('stream', 'https://stream.com/me'))->toBe('https://stream.com/me');
});

it('returns the correct URL for twitch', function () {
    expect(social_url('twitch', 'streamer'))->toBe('https://www.twitch.tv/streamer');
});

it('returns the correct URL for website', function () {
    expect(social_url('website', 'https://example.com'))->toBe('https://example.com');
});

it('returns null for unsupported platforms', function () {
    social_url('unknown', 'user123');
})->throws(Exception::class, 'Social media network not currently supported.');
