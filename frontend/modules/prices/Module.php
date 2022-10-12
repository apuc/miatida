<?php

namespace frontend\modules\prices;

use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * prices module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\prices\controllers';

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
                'only' => ['prices/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function () {
                            throw new ForbiddenHttpException();

                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'prices/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['admin', 'superAdmin'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function () {
                            throw new ForbiddenHttpException();
                        },
                    ],
                ]
            ],
        ];
    }
}
