<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'clients' => [
            'class' => 'frontend\modules\clients\Module',
        ],
        'services' => [
            'class' => 'frontend\modules\services\Module',
        ],
        'settings' => [
            'class' => 'frontend\modules\settings\Module',
        ],
        'body-types' => [
            'class' => 'frontend\modules\bodyTypes\Module',
        ],
        'work-shifts' => [
            'class' => 'frontend\modules\workShifts\Module',
        ],
        'tarifes' => [
            'class' => 'frontend\modules\tarifes\Module',
        ],
        'prices' => [
            'class' => 'frontend\modules\prices\Module',
        ],
        'car-photos' => [
            'class' => 'frontend\modules\carPhotos\Module',
        ],
        'cars' => [
            'class' => 'frontend\modules\cars\Module',
        ],
        'orders' => [
            'class' => 'frontend\modules\orders\Module',
        ],
        'account' => [
            'class' => 'frontend\modules\account\Module'
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];
