<?php

use Kirby\Cms\App as Kirby;

/**
 * Kirby Fathom Analytics Plugin
 * A Kirby 3 plugin for integrating the Fathom Analytics service to your site.
 *
 * @package   Kirby Fathom Analytics Plugin
 * @author    Paul Morel <paul@paulmorel.com>
 * @link      https://github.com/PaulMorel/kirby3-fathom-analytics
 * @copyright Paul Morel
 * @license   https://opensource.org/licenses/MIT
 */

Kirby::plugin('paulmorel/fathom-analytics', [
	'options' => [
        'siteId' => '',
        'disableForRole' => ['admin']
	],
    'snippets' => [
        'fathom-analytics-embed' => __DIR__ . '/snippets/fathom-analytics-embed.php'
    ],
    'areas' => [
        'analytics' => function ($kirby) {
            return [
                'label' => t('paulmorel.fathom-analytics.analytics'),
                'link' => 'analytics',
                'menu' => true,
                'icon' => "chart",
                'views' => [
                    [
                        'pattern' => 'analytics',
                        'action' => function() {
                            return [
                                'component' => 'analytics',
                                'props' => [
                                    'config' => [
                                        'siteId' => option('paulmorel.fathom-analytics.siteId'),
                                        'sharePassword' => option('paulmorel.fathom-analytics.sharePassword') ? hash('sha256', option('paulmorel.fathom-analytics.sharePassword')) : ''
                                    ]
                                  ],
                            ];
                        },
                    ]
                ]
            ];
        }
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
            'view.analytics' => 'Analytics',
            'paulmorel.fathom-analytics.siteId-missing' => 'Your Fathom Analytics Site ID is missing from the config file.',
        ],
        'fr' => [
            'paulmorel.fathom-analytics.analytics' => 'Statistiques',
            'view.analytics' => 'Statistiques',
            'paulmorel.fathom-analytics.siteId-missing' => 'L\'identifiant Fathom Analytics de votre site est absent du fichier de configuration.',
        ]
    ]
]);