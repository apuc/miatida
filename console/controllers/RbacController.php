<?php

namespace console\controllers;

use Yii;

class RbacController extends \yii\console\Controller
{
    /**
     * @throws \Exception
     */
    public function actionInit()
    {
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Администратор';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('client');
        $role->description = 'Пользователь';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('superAdmin');
        $role->description = 'Супер - администратор';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('washer');
        $role->description = 'Мойщик';
        Yii::$app->authManager->add($role);
    }
}