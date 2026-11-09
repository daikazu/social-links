---
name: social-links-development
description: Use when generating social media profile URLs or rendering social icon links with daikazu/social-links - the social_url() helper, the SocialNetwork enum, the <x-social-links::social-link> Blade component, footer/profile social icon rows, display names for platforms, or publishing/overriding the package's SVG icons.
---

# Social Links Development

`daikazu/social-links` turns a platform plus a profile name into a URL, and renders that URL as an accessible icon link.

## When to use this skill

- Linking to a user's or company's social profiles (footers, author bios, team pages, contact pages).
- Storing which platforms a model has (e.g. a `social_profiles` JSON column) and rendering them.
- Showing a platform's display name, or customizing or replacing an icon.

## Core API

```php
use Daikazu\SocialLinks\Enums\SocialNetwork;

SocialNetwork::LINKEDIN->getUrl('jane-doe');     // https://www.linkedin.com/in/jane-doe
SocialNetwork::LINKEDIN->label();                // LinkedIn
SocialNetwork::LINKEDIN->getUrlPattern();        // https://www.linkedin.com/in/<profileName>
SocialNetwork::tryFromString('LinkedIn');        // SocialNetwork::LINKEDIN (case-insensitive), or null
SocialNetwork::cases();                          // every supported platform

social_url(SocialNetwork::LINKEDIN, 'jane-doe'); // same as getUrl()
social_url('linkedin', 'jane-doe');              // string form; throws \Exception if unsupported
```

- Prefer the enum. It's type-safe, and an enum-backed model cast (`'platform' => SocialNetwork::class`) keeps stored values valid.
- `social_url()` with an unknown string throws a plain `\Exception`. Validate user input first with `SocialNetwork::tryFromString()` or `Rule::enum(SocialNetwork::class)`.
- Use `label()` for display text. Never use `ucfirst($network->value)`, which produces `Apple_music` or `Linkedin`.

## Blade component

```blade
<x-social-links::social-link
    :platform="SocialNetwork::GITHUB"
    name="taylorotwell"
    icon-styles="size-6 fill-current"
    class="text-zinc-500 hover:text-zinc-900"
/>
```

Renders as:

```html
<a href="https://github.com/taylorotwell" title="Visit us on GitHub" class="text-zinc-500 hover:text-zinc-900">
    <svg ... class="size-6 fill-current">...</svg>
    <span class="sr-only">GitHub</span>
</a>
```

- `platform`: a `SocialNetwork` case, or its value as a string (`"apple_music"`, not `"Apple Music"`). String matching ignores case.
- `name`: the profile value (see the table below).
- `icon-styles`: classes for the `<svg>`. The SVGs set no fill or size, so always pass a size plus `fill-current` (or a fill color), or the icon renders black and oversized.
- Every other attribute (`class`, `target`, `rel`, `aria-*`) goes on the `<a>`. For external profiles add `target="_blank" rel="noopener noreferrer"` (or `rel="me"` for identity links).
- The component includes `sr-only` text, so don't add a second visible label unless the design shows one. If it does, use `label()`.
- `sr-only` is a Tailwind class. Without Tailwind, define an equivalent visually-hidden class.

### Rendering a list of profiles

```blade
@php use Daikazu\SocialLinks\Enums\SocialNetwork; @endphp

<ul class="flex gap-4">
    @foreach ($user->social_profiles as $platform => $handle)
        @if ($network = SocialNetwork::tryFromString($platform))
            <li>
                <x-social-links::social-link :platform="$network" :name="$handle"
                    icon-styles="size-5 fill-current" target="_blank" rel="noopener noreferrer" />
            </li>
        @endif
    @endforeach
</ul>
```

## What `name` means per platform

Pass the bare handle. Don't include a leading `@`, since the pattern adds it where needed (YouTube, TikTok, /dev/null). Don't pass the full profile URL either.

| Case | Value | Label | URL pattern |
|------|-------|-------|-------------|
| `FACEBOOK` | `facebook` | Facebook | `https://www.facebook.com/<profileName>` |
| `TWITTER` | `twitter` | Twitter | `https://x.com/<profileName>` |
| `X` | `x` | X | `https://x.com/<profileName>` |
| `INSTAGRAM` | `instagram` | Instagram | `https://www.instagram.com/<profileName>` |
| `LINKEDIN` | `linkedin` | LinkedIn | `https://www.linkedin.com/in/<profileName>` |
| `YOUTUBE` | `youtube` | YouTube | `https://www.youtube.com/@<profileName>` |
| `PINTEREST` | `pinterest` | Pinterest | `https://www.pinterest.com/<profileName>` |
| `TIKTOK` | `tiktok` | TikTok | `https://www.tiktok.com/@<profileName>` |
| `SNAPCHAT` | `snapchat` | Snapchat | `https://www.snapchat.com/add/<profileName>` |
| `REDDIT` | `reddit` | Reddit | `https://www.reddit.com/user/<profileName>` |
| `YELP` | `yelp` | Yelp | `https://www.yelp.com/user_details?userid=<profileName>` |
| `WHATSAPP` | `whatsapp` | WhatsApp | `https://wa.me/<profileName>` (international number, digits only) |
| `TELEGRAM` | `telegram` | Telegram | `https://t.me/<profileName>` |
| `GITHUB` | `github` | GitHub | `https://github.com/<profileName>` |
| `DISCORD` | `discord` | Discord | `https://discordapp.com/users/<profileName>` (numeric user ID) |
| `DEV_NULL` | `dev_null` | /dev/null | `https://dev-null.sh/@<profileName>` |
| `APPLE_MUSIC` | `apple_music` | Apple Music | `https://music.apple.com/<profileName>` (path, e.g. `us/artist/name/123`) |
| `BANDCAMP` | `bandcamp` | Bandcamp | `https://<profileName>.bandcamp.com` (subdomain) |
| `GOOGLE_PLAY` | `google_play` | Google Play | `https://play.google.com/store/music/artist?id=<profileName>` |
| `PATREON` | `patreon` | Patreon | `https://www.patreon.com/<profileName>` |
| `SOUNDCLOUD` | `soundcloud` | SoundCloud | `https://soundcloud.com/<profileName>` |
| `SPOTIFY` | `spotify` | Spotify | `https://open.spotify.com/artist/<profileName>` (artist ID) |
| `TWITCH` | `twitch` | Twitch | `https://www.twitch.tv/<profileName>` |
| `EMAIL` | `email` | Email | `mailto:<profileName>` (email address) |
| `PHONE` | `phone` | Phone | `tel:<profileName>` (E.164, e.g. `+15551234567`) |

These platforms output `name` unchanged, so pass a complete URL (for `ADDRESS`, a maps URL or the address text):

`ADDRESS`, `BOOKING`, `BUY_MERCH`, `CONTACT_FORM`, `DONATE`, `OTHER`, `STREAM`, `WEBSITE`.

## Customizing icons

Icons are Blade views at `social-links::icons.{value}`, each one an inline `<svg @class($classes)>`. To change them:

```bash
php artisan vendor:publish --tag="social-links-views"
```

Then edit `resources/views/vendor/social-links/icons/{value}.blade.php`. When replacing an SVG:
- Keep the `@class($classes)` attribute on the root `<svg>`, or `icon-styles` stops working.
- Remove any hardcoded `fill` so `fill-current` and text colors apply.
- Keep a `viewBox` and leave out `width` and `height`, so classes control the size.

## Pitfalls

- Passing a full URL to a handle-based platform gives you a doubled URL (`https://github.com/https://github.com/...`). If users paste URLs, strip them down to the handle before saving.
- Passing `@handle` to YouTube, TikTok or /dev/null gives you `@@handle`.
- Platforms not in the enum aren't supported. Use `OTHER` or `WEBSITE` with a full URL, and don't invent string values.
