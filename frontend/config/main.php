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
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['clients/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'clients/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
        'services' => [
            'class' => 'frontend\modules\services\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['services/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'services/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
        'settings' => [
            'class' => 'frontend\modules\settings\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['settings/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'settings/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
        'body-types' => [
            'class' => 'frontend\modules\bodyTypes\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['body-types/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'body-types/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
        'work-shifts' => [
            'class' => 'frontend\modules\workShifts\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['work-shifts/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'work-shifts/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
        'tarifes' => [
            'class' => 'frontend\modules\tarifes\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['tarifes/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'tarifes/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
        'prices' => [
            'class' => 'frontend\modules\prices\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['prices/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'prices/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
        'cars' => [
            'class' => 'frontend\modules\cars\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['cars/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'cars/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
        'orders' => [
            'class' => 'frontend\modules\orders\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['orders/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'orders/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new NotFoundHttpException();
                        },
                    ],
                ]
            ],
        ],
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
            'class' => 'yii\web\User',
            'identityClass' => 'andrewdanilov\adminpanel\models\User',
            'accessChecker' => 'andrewdanilov\adminpanel\AccessChecker',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => ['user/login'],
        ],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
//        ],
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
            'class' => 'andrewdanilov\adminpanel\controllers\UserController',
            'viewPath' => '@backend/someotherlocation/views/user', // optional, custom UserController views location
        ],
    ],
    'params' => $params,
];
