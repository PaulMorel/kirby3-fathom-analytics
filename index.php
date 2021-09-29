<?php
Kirby::plugin('paulmorel/fathom-analytics', [
	'options' => [
        'siteId' => '',
	],
    'snippets' => [
        'fathom-analytics-embed' => __DIR__ . '/snippets/embed.php'
    ],
    'api' => [
        'routes' => [
            [
                'pattern' => 'fathom-analytics',
                'method' => 'GET',
                'action' => function () {
                        return [
                            'siteId' => option('paulmorel.fathom-analytics.siteId'),
                            'sharePassword' => option('paulmorel.fathom-analytics.sharePassword') ? hash('sha256', option('paulmorel.fathom-analytics.sharePassword')) : ''
                        ];
                    }
                ]
        ]
    ],

	'translations' => [
        'en' => [
            'paulmorel.fathom-analytics.analytics' => 'Analytics',
            'paulmorel.fathom-analytics.siteId-missing' => 'Your Fathom Analytics Site ID is missing from the config file.',
        ],
        'fr' => [
            'paulmorel.fathom-analytics.analytics' => 'Métriques',
            'paulmorel.fathom-analytics.siteId-missing' => 'L\'identifiant Fathom Analytics de votre site est absent du fichier de configuration.',
        ]
    ]
]);