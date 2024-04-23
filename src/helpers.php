<?php

if (! function_exists('social_url')) {
    /**
     * Generate social media URL based on the network and profile name.
     *
     * @param  string  $network  The social media network.
     * @param  string  $profileName  The profile name.
     * @return string The generated social media URL.
     *
     * @throws Exception If the social media network is not currently supported.
     */
    function social_url(string $network, string $profileName): string
    {
        $network = strtolower($network);

        $platformURL = match ($network) {
            'facebook' => 'https://www.facebook.com/<profileName>',
            'twitter', 'x' => 'https://x.com/<profileName>',
            'instagram' => 'https://www.instagram.com/<profileName>',
            'linkedin' => 'https://www.linkedin.com/in/<profileName>',
            'youtube' => 'https://www.youtube.com/user/<profileName>',
            'pinterest' => 'https://www.pinterest.com/<profileName>',
            'tiktok' => 'https://www.tiktok.com/@<profileName>',
            'snapchat' => 'https://www.snapchat.com/add/<profileName>',
            'reddit' => 'https://www.reddit.com/user/<profileName>',
            'yelp' => 'https://www.yelp.com/user_details?userid=<profileName>',
            'whatsapp' => 'https://wa.me/<profileName>',
            'telegram' => 'https://t.me/<profileName>',
            'github' => 'https://github.com/<profileName>',
            'discord' => 'https://discordapp.com/users/<profileName>',
            default => null,
        };

        if ($platformURL) {
            return str_replace('<profileName>', $profileName, $platformURL);
        }

        throw new Exception('Social media network not currently supported.');
    }

}
