<?php

namespace common\services;

use Yii;

class RoleService
{

    public static function setRole($id, $role)
    {
        $userRole = Yii::$app->authManager->getRole($role);
        Yii::$app->authManager->assign($userRole, $id);
    }

}
