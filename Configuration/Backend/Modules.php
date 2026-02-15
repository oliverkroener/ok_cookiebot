<?php

use OliverKroener\OkCookiebotCookieConsent\Controller\Backend\ConsentController;

return [
    'web_okcookiebot' => [
        'parent' => 'web',
        'position' => ['after' => 'web_info'],
        'access' => 'user,group',
        'path' => '/module/web/cookiebot',
        'iconIdentifier' => 'ext-ok-cookiebot',
        'labels' => 'LLL:EXT:ok_cookiebot/Resources/Private/Language/locallang.xlf',
        'navigationComponent' => '@typo3/backend/page-tree/page-tree-element',
        'routes' => [
            '_default' => [
                'target' => ConsentController::class . '::indexAction',
            ],
            'save' => [
                'target' => ConsentController::class . '::saveAction',
                'methods' => ['POST'],
            ],
        ],
    ],
];
