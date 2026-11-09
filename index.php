<?php

use Kirby\Cms\App as Kirby;

/**
 * Kirby Fathom Analytics Plugin
 * A Kirby plugin for integrating the Fathom Analytics service to your site.
 *
 * @package   Kirby Fathom Analytics Plugin
 * @author    Paul Morel <paul@paulmorel.com>
 * @link      https://github.com/PaulMorel/kirby3-fathom-analytics
 * @copyright Paul Morel
 * @license   https://opensource.org/licenses/MIT
 */

Kirby::plugin('paulmorel/fathom-analytics', [
    'options' => [
        'siteId'         => null,
        'sharePassword'  => null,
        'customDomain'   => 'https://cdn.usefathom.com',
        'disableForRole' => ['admin'],
    ],

    'snippets' => [
        'fathom-analytics-embed' => __DIR__ . '/snippets/fathom-analytics-embed.php',
    ],

    'areas' => [
        'analytics' => fn () => [
            'label' => t('paulmorel.fathom-analytics.analytics'),
            'icon'  => 'chart',
            'menu'  => true,
            'link'  => 'analytics',
            'views' => [
                [
                    'pattern' => 'analytics',
                    'action'  => function () {
                        $siteId   = option('paulmorel.fathom-analytics.siteId');
                        $password = option('paulmorel.fathom-analytics.sharePassword');
                        $url      = null;

                        if ($siteId) {
                            // The last path segment is only a label. Private
                            // dashboards take the SHA-256 of the share password.
                            $url = 'https://app.usefathom.com/share/' . rawurlencode($siteId) . '/kirby';

                            if ($password) {
                                $url .= '?password=' . hash('sha256', $password);
                            }
                        }

                        return [
                            'component' => 'k-fathom-analytics-view',
                            'title'     => t('paulmorel.fathom-analytics.analytics'),
                            'props'     => [
                                'url' => $url,
                            ],
                        ];
                    },
                ],
            ],
        ],
    ],

    'translations' => [
        'en' => [
            'paulmorel.fathom-analytics.analytics'       => 'Analytics',
            'paulmorel.fathom-analytics.open'            => 'Open in Fathom',
            'paulmorel.fathom-analytics.siteId-missing'  => 'Set <code>paulmorel.fathom-analytics.siteId</code> in <code>site/config/config.php</code> to show your Fathom dashboard here.',
        ],
        'fr' => [
            'paulmorel.fathom-analytics.analytics'       => 'Statistiques',
            'paulmorel.fathom-analytics.open'            => 'Ouvrir dans Fathom',
            'paulmorel.fathom-analytics.siteId-missing'  => 'Ajoutez <code>paulmorel.fathom-analytics.siteId</code> dans <code>site/config/config.php</code> pour afficher votre tableau de bord Fathom ici.',
        ],
    ],
]);
