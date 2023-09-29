<?php

namespace common\services;

use common\models\User;

class UserService
{
    public static function makeUser($model, $role, $is_update)
    {
        if ($is_update === false) {
            $userModel = new User();
        } else {
            $userModel = \common\models\User::findModel($model->user_id);
        }
        $userModel->username = $model->phone;
        $userModel->email = rand(1000, 100000000).'avas';
        $userModel->phone = $model->phone;
        $userModel->password = rand(1000, 100000000).'asdasd';
        $userModel->status = 10;
        $userModel->is_admin = 0;
        $userModel->save();
        if ($is_update === false) {
            RoleService::setRole($userModel->id, $role);
        }
        return $userModel->id;
    }
}
