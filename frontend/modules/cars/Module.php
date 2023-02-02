<?php

namespace frontend\modules\cars;

use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * cars module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\cars\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['cars/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function ($rule, $action) {
                            throw new ForbiddenHttpException();

                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'cars/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@', 'admin', 'superAdmin'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function ($rule, $action) {
                            throw new ForbiddenHttpException();

                        },
                    ],
                ]
            ],
        ];
    }
}
