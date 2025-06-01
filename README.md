<picture>
  <source media="(prefers-color-scheme: dark)" srcset="art/header-dark.png">
  <img alt="Logo for Social Profile Links for Laravel" src="art/header-light.png">
</picture>

# Social Profile Links for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/daikazu/social-links.svg?style=flat-square)](https://packagist.org/packages/daikazu/social-links)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/daikazu/social-links/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/daikazu/social-links/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/daikazu/social-links/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/daikazu/social-links/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/daikazu/social-links.svg?style=flat-square)](https://packagist.org/packages/daikazu/social-links)


This Laravel package provides easy-to-use functionalities to generate social media profile URLs and render social icon links directly in your Laravel applications.


## Installation

You can install the package via composer:

```bash
composer require daikazu/social-links
```
Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="social-links-views"
```

## Usage

### Generating Social Profile URLs

You can generate a URL for a social media profile using the `social_url` helper function. Here's how you can use it:

```php
$url = social_url('facebook', 'username');
```
Replace `'facebook'` with the desired platform and `'username'` with the user's social media profile username.

### Displaying Social Icons

To display a social icon link, use the Blade component included in the package. Here's an example:
```bladehtml
<x-social-links::social-link platform="facebook" name="username" icon-styles="size-12 hover:text-red-500 fill-current"/>
```
Adjust the `platform`, `name`, and `icon-styles` attributes as necessary to fit your needs.

## Supported Social Platforms

The package currently supports URL generation and icon link rendering for the following social media platforms:

- Facebook
- Twitter
- Instagram
- LinkedIn
- Pinterest
- Youtube
- Reddit
- Discord
- Github
- Yelp
- Snapchat
- Whatsapp
- Telegram
- Tiktok

Check back for updates or contribute to extend support for other platforms.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mike Wall](https://github.com/daikazu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
