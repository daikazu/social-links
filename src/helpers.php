<?php

use Daikazu\SocialLinks\Enums\SocialNetwork;

if (! function_exists('social_url')) {
    /**
     * Generate social media URL based on the network and profile name.
     *
     * @param  string|SocialNetwork  $network  The social media network.
     * @param  string  $profileName  The profile name.
     * @return string The generated social media URL.
     *
     * @throws Exception If the social media network is not currently supported.
     */
    function social_url(string|SocialNetwork $network, string $profileName): string
    {
        if (is_string($network)) {
            $socialNetwork = SocialNetwork::tryFromString($network);
            if ($socialNetwork === null) {
                throw new Exception('Social media network not currently supported.');
            }
        } else {
            $socialNetwork = $network;
        }

        return $socialNetwork->getUrl($profileName);
    }

}
