# Kirby Fathom Analytics
![GitHub release (latest by date)](https://img.shields.io/github/v/release/paulmorel/kirby3-fathom-analytics)
![Kirby CMS Version](https://img.shields.io/badge/Kirby-v5-informational)
![License](https://img.shields.io/github/license/paulmorel/kirby3-fathom-analytics)

A Kirby plugin for integrating the privacy focused [Fathom Analytics](https://usefathom.com/) service to your site.

## Main Feautres

This plugin does two things:

- It provides a panel view to display the Fathom Analytics dashboard directily in the panel
- It provides a snippet to embed the Fathom Analytics tracking code 

## Requirements
- Kirby CMS v5

For Kirby 3, use [v1.0.0](https://github.com/PaulMorel/kirby3-fathom-analytics/releases/tag/v1.0.0).


## Installation

### Download

Download and copy this repository to the plugins folder of your Kirby installation. You should end up with a folder structure like this: 

```
/site/plugins/fathom-analytics
```

### Git submodule

If you prefer to use Git submodules, you can install the plugin like this:
```
git submodule add https://github.com/PaulMorel/kirby3-fathom-analytics.git site/plugins/fathom-analytics
```

### Composer

If you are using Composer, you can install the plugin like this:

```
composer require paulmorel/fathom-analytics
```

## Usage


### Setup
After installing the plugin, there a couple of important steps to do in your Fathom Analytics settings.

1. If not already done, add your site in Fathom Analytics
2. Go to your site settings and get the SiteID.
3. Still in the site settings, setup Site Sharing, either Public or Private.

Afterwards, in your site config, add your SiteID and the share password (if needed).

Example:

```php
return [
    /* ... */
    'paulmorel.fathom-analytics' => [
        'siteId' => 'ABCDEFGH',
        'sharePassword' => 'hunter2'
    ]
    /* ... */
];
```

### Embedding the tracking code

The tracking code is provided as a snippet, so it can be simply embedded in the `<head>` tag with the `snippet()` helper function.

The snippet outputs nothing if no `siteId` is set, when Kirby's `debug` option is `true`, or for logged-in users whose role is in `disableForRole`.


```php
<head>
    <!-- ... -->
    <?php snippet('fathom-analytics-embed'); ?>
    <!-- ... -->
</head>
```

### Viewing your stats

The plugin adds an Analytics view to the Panel menu. It loads your site's shared Fathom dashboard in an iframe.

- The dashboard fills the space under the view's header and scrolls inside its frame. Fathom's share page can't report its height to the page embedding it, so the iframe can't grow to fit its content.
- The dashboard follows the Panel's light/dark theme. Fathom's share page follows `prefers-color-scheme`, and the view sets `color-scheme` on the iframe to the Panel's current theme.
- An "Open in Fathom" button in the header opens the dashboard in a new tab.


## Options

### `siteId` (Required)

This is the SiteID provided by Fathom Analytics at the top of your site's setting page.

### `sharePassword`

This is the share password for your site's dashboard. This is only required if you set Site Sharing to Private.

### `customDomain`

If you use the custom domain feature with Fathom Analytics, you can set it with this option.

Example:

```php
'customDomain' => 'https://armadillo.example.com'
```

### `disableForRole`

Allows you to disable the tracking code for logged in users with the specified roles. Expects an `Array`. Defaults to `['admin']`.

Checking the logged-in user doesn't stop Kirby's page cache from working: Kirby still serves cached pages to visitors, and only renders pages fresh for requests that carry a Panel session.

Examples:
```php
'disableForRole' => [
    'admin'
],
```
```php
'disableForRole' => [
    'admin',
    'editor',
    'translator'
],
```
## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please create a new issue.

## License

MIT

## Support

This plugin is completely free to use, but if you'd like to support me or this project, [consider signing-up to Fathom Analytics with my affiliate link](https://usefathom.com/ref/44ARQE).
