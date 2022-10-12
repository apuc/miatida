<?php

namespace frontend\modules\workShifts;

use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * work-shifts module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\workShifts\controllers';

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
                'only' => ['work-shifts/*', 'default/index'],
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
                        'actions' => ['index', 'work-shifts/*', 'create', 'delete', 'view', 'update'],
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
