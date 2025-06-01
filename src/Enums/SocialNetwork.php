<?php

namespace Daikazu\SocialLinks\Enums;

enum SocialNetwork: string
{
    case FACEBOOK = 'facebook';
    case TWITTER = 'twitter';
    case X = 'x';
    case INSTAGRAM = 'instagram';
    case LINKEDIN = 'linkedin';
    case YOUTUBE = 'youtube';
    case PINTEREST = 'pinterest';
    case TIKTOK = 'tiktok';
    case SNAPCHAT = 'snapchat';
    case REDDIT = 'reddit';
    case YELP = 'yelp';
    case WHATSAPP = 'whatsapp';
    case TELEGRAM = 'telegram';
    case GITHUB = 'github';
    case DISCORD = 'discord';

    /**
     * Try to create a SocialNetwork from a string.
     *
     * @param  string  $network  The network name as a string.
     * @return self|null The SocialNetwork enum value, or null if not found.
     */
    public static function tryFromString(string $network): ?self
    {
        $network = strtolower($network);

        return self::tryFrom($network);
    }

    /**
     * Get the URL pattern for this social network.
     *
     * @return string The URL pattern with <profileName> placeholder.
     */
    public function getUrlPattern(): string
    {
        return match ($this) {
            self::FACEBOOK => 'https://www.facebook.com/<profileName>',
            self::TWITTER, self::X => 'https://x.com/<profileName>',
            self::INSTAGRAM => 'https://www.instagram.com/<profileName>',
            self::LINKEDIN => 'https://www.linkedin.com/in/<profileName>',
            self::YOUTUBE => 'https://www.youtube.com/@<profileName>',
            self::PINTEREST => 'https://www.pinterest.com/<profileName>',
            self::TIKTOK => 'https://www.tiktok.com/@<profileName>',
            self::SNAPCHAT => 'https://www.snapchat.com/add/<profileName>',
            self::REDDIT => 'https://www.reddit.com/user/<profileName>',
            self::YELP => 'https://www.yelp.com/user_details?userid=<profileName>',
            self::WHATSAPP => 'https://wa.me/<profileName>',
            self::TELEGRAM => 'https://t.me/<profileName>',
            self::GITHUB => 'https://github.com/<profileName>',
            self::DISCORD => 'https://discordapp.com/users/<profileName>',
        };
    }

    /**
     * Get the URL for this social network with the given profile name.
     *
     * @param  string  $profileName  The profile name to use in the URL.
     * @return string The generated URL.
     */
    public function getUrl(string $profileName): string
    {
        return str_replace('<profileName>', $profileName, $this->getUrlPattern());
    }
}
