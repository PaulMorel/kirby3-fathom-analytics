<?php if ( option('paulmorel.fathom-analytics.siteId') ) : ?>
	<?php if ( ! $kirby->user() || ! in_array($kirby->user()->role()->id(), option('paulmorel.fathom-analytics.disableForRole', [])) ) : ?>
		<script src="<?= option('paulmorel.fathom-analytics.customDomain', 'https://cdn.usefathom.com' ) ?>/script.js" data-site="<?= option('paulmorel.fathom-analytics.siteId') ?>" defer></script>
	<?php endif; ?>
<?php endif; ?>