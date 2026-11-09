# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

Kirby 5 support. This is a breaking change: Kirby 3 and 4 are no longer supported.

### Fixed

- Panel view rendering without the Panel menu and topbar. Kirby 5 removed `k-inside` and `k-view`; the view now uses `k-panel-inside` and `k-header`.
- Dashboard stuck in a small fixed-height box (#5). Fathom's share page no longer includes the iframe-resizer content script, so the iframe can't size itself to its content. The dashboard now fills the space under the view's header and scrolls inside its frame.

### Added

- The embedded dashboard follows the Panel's light/dark theme.
- "Open in Fathom" button in the view header.
- The tracking snippet is also skipped when Kirby's `debug` option is `true`.

### Changed

- `index.js` is plain JavaScript using the template compiler the Panel loads by default, so there is no build step.
- The snippet escapes `siteId` and `customDomain`.
- `composer.json` requires `getkirby/cms` `^5.0`.

### Removed

- Parcel build setup (`src/`, `package.json`, `yarn.lock`) and the bundled iframe-resizer.
- API route and fallback for Kirby 3.4 to 3.5.

## [1.0.0] - 2021-10-21

### Added

- Support for Kirby v3.6
- `disableForRole` option that disables the tracking code snippet for specific user roles. Defaults to `[ 'admin' ]`
- Tested support for lowest working Kirby 3 version and added badge at the top of readme file

### Fixed

- Loading icon not spinning while Fathom Analytics iframe is loading
- Missing translation in dropdown menu

### Changed

- French translations from *Métriques* to *Statistiques*


## [0.0.2] - 2021-09-30

### Fixed
- Tracking code snippet file not found
- Missing instructions in readme on how to embed the tracking code snippet

## [0.0.1] - 2021-09-28

### Added
- Panel view to display the Fathom Analytics dashboard directily in the panel
- Snippet to embed the Fathom Analytics tracking code 

[Unreleased]: https://github.com/PaulMorel/kirby3-fathom-analytics/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/PaulMorel/kirby3-fathom-analytics/releases/tag/v1.0.0
[0.0.2]: https://github.com/PaulMorel/kirby3-fathom-analytics/releases/tag/v0.0.2
[0.0.1]: https://github.com/PaulMorel/kirby3-fathom-analytics/releases/tag/v0.0.1