# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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

[1.0.0]: https://github.com/PaulMorel/kirby3-fathom-analytics/releases/tag/v1.0.0
[0.0.2]: https://github.com/PaulMorel/kirby3-fathom-analytics/releases/tag/v0.0.2
[0.0.1]: https://github.com/PaulMorel/kirby3-fathom-analytics/releases/tag/v0.0.1