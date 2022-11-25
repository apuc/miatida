<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property string $_password
 * @property string $phone
 */
class User extends \andrewdanilov\adminpanel\models\User
{
    public $role;
    public $_password;

    const  ROLE_ADMIN = 'admin';
    const  ROLE_CLIENT = 'client';
    const  ROLE_WASHER = 'washer';


    public static function getRolesList()
    {
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_CLIENT => 'Клиент',
            self::ROLE_WASHER => 'Мойщик'
        ];
    }

    public static function getStatuses()
    {
        return [
            static::STATUS_DELETED => 'Удален',
            static::STATUS_INACTIVE => 'Неактивиен',
            static::STATUS_ACTIVE => 'Активен',
        ];
    }

    public static function getRole($id)
    {
        if (Yii::$app->authManager->getRolesByUser($id)) {
            return array_values(Yii::$app->authManager->getRolesByUser($id))[0]->description;
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */


    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['role'], 'string'];
        $rules[] = [['phone'], 'string'];
        $rules[] = [['phone'], 'required'];
        return $rules;
    }


    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['phone'] = 'Телефон';
        return $labels;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'username');
    }

    public static function getListWasher()
    {
        $washer = Yii::$app->authManager->getUserIdsByRole('washer');
        return ArrayHelper::map(self::find()->where(['id' => $washer])->all(), 'id', 'username');
    }

    public static function findModel($id)
    {
        return User::findOne(['id' => $id]);
    }

    public function getPassword()
    {
        return '';
    }
}
