## daikazu/social-links

This package builds social profile URLs and renders social icon links. Prefer the `Daikazu\SocialLinks\Enums\SocialNetwork` enum to plain strings. When rendering social links, linking to profiles or adding or overriding icons, activate the `social-links-development` skill.

@verbatim
<code-snippet name="Generate a profile URL" lang="php">
use Daikazu\SocialLinks\Enums\SocialNetwork;

$url = SocialNetwork::GITHUB->getUrl('taylorotwell');   // https://github.com/taylorotwell
$url = social_url(SocialNetwork::GITHUB, 'taylorotwell'); // same; also accepts 'github'
$label = SocialNetwork::GITHUB->label();                  // "GitHub"
</code-snippet>

<code-snippet name="Render an icon link" lang="blade">
<x-social-links::social-link :platform="SocialNetwork::GITHUB" name="taylorotwell" icon-styles="size-6 fill-current" class="text-gray-500 hover:text-gray-900" />
</code-snippet>
@endverbatim

- Pass only the handle (no `@`, no domain) as `name`. Some platforms instead take a full URL, an email or a phone number; the skill lists which.
- Use a display name from `$network->label()`. Never build one with `ucfirst($network->value)`.
