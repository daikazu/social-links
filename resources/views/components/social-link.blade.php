@props(['platform', 'name', 'iconStyles' => null])

@php
    use Daikazu\SocialLinks\Enums\SocialNetwork;

    $url = social_url($platform, $name);
    $network = $platform instanceof SocialNetwork ? $platform : SocialNetwork::tryFromString($platform);
    $label = $network->label();
    $iconView = 'social-links::icons.' . $network->value;
@endphp

@if($url)
    <a href="{{ $url }}" title="Visit us on {{ $label }}" {{ $attributes }}>
        @include($iconView, ['classes' => $iconStyles])  <!-- Include the icon view with optional classes -->
        <span class="sr-only">{{ $label }}</span>
    </a>
@endif
