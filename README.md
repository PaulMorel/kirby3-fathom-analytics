# Kirby Fathom Analytics

A Kirby 3 plugin for integrating the [Fathom Analytics](https://usefathom.com/) service to your site.

## Main Feautres

This plugin does two things:

- It provides a panel view to display the Fathom Analytics dashboard directily in the panel
- It provides a snippet to embed the Fathom Analytics tracking code 

## Requirements
- Kirby CMS v3.5


## Installation

### Download

Download and copy this repository to the plugins folder of your Kirby 3 installation. You should end up with a folder structure like this: 

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

If no `siteId` is provided, the snippet does nothing.


```php
<head>
    <!-- ... -->
    <php snippet('fathom-analytics-embed'); ?>
    <!-- ... -->
</head>
```

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

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please create a new issue.

## License

MIT

## Support

This plugin is completely free to use, but if you'd like to support me or this project, [consider signing-up to Fathom Analytics with my affiliate link](https://usefathom.com/ref/44ARQE).
