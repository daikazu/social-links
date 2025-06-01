@props(['platform', 'name', 'iconStyles' => null])

@php
    use Daikazu\SocialLinks\Enums\SocialNetwork;

    $platformString = $platform instanceof SocialNetwork ? $platform->value : $platform;
    $url = social_url($platform, $name);
    $iconView = 'social-links::icons.' . $platformString;
@endphp

@if($url)
    <a href="{{ $url }}" title="Visit us on {{ ucfirst($platformString) }}" {{ $attributes }}>
        @include($iconView, ['classes' => $iconStyles])  <!-- Include the icon view with optional classes -->
        <span class="sr-only">{{ ucfirst($platformString) }}</span>
    </a>
@endif
