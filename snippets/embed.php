<?php if ( option('paulmorel.fathom-analytics.siteId') ) : ?>
<script src="<?= option('paulmorel.fathom-analytics.customDomain', 'https://cdn.usefathom.com' ) ?>/script.js" data-site="<?= option('paulmorel.fathom-analytics.siteId') ?>" defer></script>
<?php endif; ?>