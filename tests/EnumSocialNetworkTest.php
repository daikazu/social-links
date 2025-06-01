<?php

use Daikazu\SocialLinks\Enums\SocialNetwork;

it('returns the correct URL for Facebook using enum', function () {
    expect(social_url(SocialNetwork::FACEBOOK, 'user123'))->toBe('https://www.facebook.com/user123');
});

it('returns the correct URL for Twitter using enum', function () {
    expect(social_url(SocialNetwork::TWITTER, 'user123'))->toBe('https://x.com/user123');
});

it('returns the correct URL for X using enum', function () {
    expect(social_url(SocialNetwork::X, 'user123'))->toBe('https://x.com/user123');
});

it('returns the correct URL for Instagram using enum', function () {
    expect(social_url(SocialNetwork::INSTAGRAM, 'user123'))->toBe('https://www.instagram.com/user123');
});

it('returns the correct URL for LinkedIn using enum', function () {
    expect(social_url(SocialNetwork::LINKEDIN, 'user123'))->toBe('https://www.linkedin.com/in/user123');
});

it('returns the correct URL for YouTube using enum', function () {
    expect(social_url(SocialNetwork::YOUTUBE, 'user123'))->toBe('https://www.youtube.com/@user123');
});

it('returns the correct URL for Pinterest using enum', function () {
    expect(social_url(SocialNetwork::PINTEREST, 'user123'))->toBe('https://www.pinterest.com/user123');
});

it('returns the correct URL for TikTok using enum', function () {
    expect(social_url(SocialNetwork::TIKTOK, 'user123'))->toBe('https://www.tiktok.com/@user123');
});

it('returns the correct URL for Snapchat using enum', function () {
    expect(social_url(SocialNetwork::SNAPCHAT, 'user123'))->toBe('https://www.snapchat.com/add/user123');
});

it('returns the correct URL for Reddit using enum', function () {
    expect(social_url(SocialNetwork::REDDIT, 'user123'))->toBe('https://www.reddit.com/user/user123');
});

it('returns the correct URL for Yelp using enum', function () {
    expect(social_url(SocialNetwork::YELP, 'user123'))->toBe('https://www.yelp.com/user_details?userid=user123');
});

it('returns the correct URL for WhatsApp using enum', function () {
    expect(social_url(SocialNetwork::WHATSAPP, 'user123'))->toBe('https://wa.me/user123');
});

it('returns the correct URL for Telegram using enum', function () {
    expect(social_url(SocialNetwork::TELEGRAM, 'user123'))->toBe('https://t.me/user123');
});

it('returns the correct URL for GitHub using enum', function () {
    expect(social_url(SocialNetwork::GITHUB, 'user123'))->toBe('https://github.com/user123');
});

it('returns the correct URL for Discord using enum', function () {
    expect(social_url(SocialNetwork::DISCORD, 'user123'))->toBe('https://discordapp.com/users/user123');
});

it('returns the correct URL for Address using enum', function () {
    expect(social_url(SocialNetwork::ADDRESS, '123 Main St'))->toBe('123 Main St');
});

it('returns the correct URL for Apple Music using enum', function () {
    expect(social_url(SocialNetwork::APPLE_MUSIC, 'artist/123'))->toBe('https://music.apple.com/artist/123');
});

it('returns the correct URL for Bandcamp using enum', function () {
    expect(social_url(SocialNetwork::BANDCAMP, 'artistname'))->toBe('https://artistname.bandcamp.com');
});

it('returns the correct URL for Booking using enum', function () {
    expect(social_url(SocialNetwork::BOOKING, 'https://booking.com/profile'))->toBe('https://booking.com/profile');
});

it('returns the correct URL for Buy Merch using enum', function () {
    expect(social_url(SocialNetwork::BUY_MERCH, 'https://store.com'))->toBe('https://store.com');
});

it('returns the correct URL for Contact Form using enum', function () {
    expect(social_url(SocialNetwork::CONTACT_FORM, 'https://example.com/contact'))->toBe('https://example.com/contact');
});

it('returns the correct URL for Donate using enum', function () {
    expect(social_url(SocialNetwork::DONATE, 'https://donate.com/me'))->toBe('https://donate.com/me');
});

it('returns the correct URL for Email using enum', function () {
    expect(social_url(SocialNetwork::EMAIL, 'user@example.com'))->toBe('mailto:user@example.com');
});

it('returns the correct URL for Google Play using enum', function () {
    expect(social_url(SocialNetwork::GOOGLE_PLAY, 'artist123'))->toBe('https://play.google.com/store/music/artist?id=artist123');
});

it('returns the correct URL for Other using enum', function () {
    expect(social_url(SocialNetwork::OTHER, 'https://other.com'))->toBe('https://other.com');
});

it('returns the correct URL for Patreon using enum', function () {
    expect(social_url(SocialNetwork::PATREON, 'creator'))->toBe('https://www.patreon.com/creator');
});

it('returns the correct URL for Phone using enum', function () {
    expect(social_url(SocialNetwork::PHONE, '+1234567890'))->toBe('tel:+1234567890');
});

it('returns the correct URL for SoundCloud using enum', function () {
    expect(social_url(SocialNetwork::SOUNDCLOUD, 'artist'))->toBe('https://soundcloud.com/artist');
});

it('returns the correct URL for Spotify using enum', function () {
    expect(social_url(SocialNetwork::SPOTIFY, '123456'))->toBe('https://open.spotify.com/artist/123456');
});

it('returns the correct URL for Stream using enum', function () {
    expect(social_url(SocialNetwork::STREAM, 'https://stream.com/me'))->toBe('https://stream.com/me');
});

it('returns the correct URL for Twitch using enum', function () {
    expect(social_url(SocialNetwork::TWITCH, 'streamer'))->toBe('https://www.twitch.tv/streamer');
});

it('returns the correct URL for Website using enum', function () {
    expect(social_url(SocialNetwork::WEBSITE, 'https://example.com'))->toBe('https://example.com');
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
