<?php

namespace frontend\controllers;

use Yii;

class RolesController extends \yii\base\Controller
{
    public static function roleSuperAdmin($id)
    {
        $userRole = Yii::$app->authManager->getRole('superAdmin');
        Yii::$app->authManager->assign($userRole, $id);
    }

    public static function roleAdmin($id)
    {
        $userRole = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($userRole, $id);
    }

    public static function roleWasher($id)
    {
        $userRole = Yii::$app->authManager->getRole('washer');
        Yii::$app->authManager->assign($userRole, $id);
    }

    public static function roleClient($id)
    {
        $userRole = Yii::$app->authManager->getRole('client');
        Yii::$app->authManager->assign($userRole, $id);
    }
}