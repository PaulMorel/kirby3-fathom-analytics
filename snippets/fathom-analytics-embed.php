<?php
/**
 * Fathom tracking script.
 *
 * Skipped when no site ID is set, in debug mode (local dev) and for logged-in
 * users whose role is in `disableForRole`, so editors don't count their own
 * visits. Checking the user is cache-safe: Kirby still serves cached pages to
 * visitors and only renders fresh for requests with a Panel session.
 */

$siteId = option('paulmorel.fathom-analytics.siteId');
$user   = $kirby->user();

if (
    !$siteId ||
    option('debug') === true ||
    ($user && in_array($user->role()->id(), option('paulmorel.fathom-analytics.disableForRole', []), true))
) {
    return;
}
?>
<script src="<?= esc(rtrim(option('paulmorel.fathom-analytics.customDomain'), '/')) ?>/script.js" data-site="<?= esc($siteId) ?>" defer></script>
