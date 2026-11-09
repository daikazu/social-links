@props(['platform', 'name', 'iconStyles' => null])

@php
    use Daikazu\SocialLinks\Enums\SocialNetwork;

    $platformString = $platform instanceof SocialNetwork ? $platform->value : $platform;
    $url = social_url($platform, $name);
    $label = ($platform instanceof SocialNetwork ? $platform : SocialNetwork::tryFromString($platform))->label();
    $iconView = 'social-links::icons.' . $platformString;
@endphp

@if($url)
    <a href="{{ $url }}" title="Visit us on {{ $label }}" {{ $attributes }}>
        @include($iconView, ['classes' => $iconStyles])  <!-- Include the icon view with optional classes -->
        <span class="sr-only">{{ $label }}</span>
    </a>
@endif
