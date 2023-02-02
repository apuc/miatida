<?php

use yii\web\NotFoundHttpException;

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
        'cash-box' => [
            'class' => 'frontend\modules\cashBox\Module',
        ],
        'salary' => [
            'class' => 'frontend\modules\salary\Module',
        ],
        'payment-salary' => [
            'class' => 'frontend\modules\paymentSalary\Module',
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
        'cars' => [
            'class' => 'frontend\modules\cars\Module',
        ],
        'orders' => [
            'class' => 'frontend\modules\orders\Module',
        ],
        'washer' => [
            'class' => 'frontend\modules\washer\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@frontend//views'
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
    'controllerMap' => [
        'user' => [
            'class' => 'frontend\controllers\UserController',
            'viewPath' => '@frontend/views/user', // optional, custom UserController views location
        ],
    ],
    'params' => $params,
];
