@props(['platform', 'name', 'iconStyles' => null])

@php
    $url = social_url($platform, $name);
    $iconView = 'social-links::icons.' . $platform;
@endphp

@if($url)
    <a href="{{ $url }}{{ $name }}" title="Visit us on {{ ucfirst($platform) }}" {{ $attributes }}>
        @include($iconView, ['classes' => $iconStyles])  <!-- Include the icon view with optional classes -->
        <span class="sr-only">{{ ucfirst($platform) }}</span>
    </a>
@endif
