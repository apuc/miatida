<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string $phone
 * @property string|null $additional_info
 */
class Clients extends \yii\db\ActiveRecord
{
    public $password;
    public $email;
    public $car_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'phone'], 'required'],
            [['user_id', 'car_id'], 'integer'],
            [['additional_info', 'email'], 'string'],
            [['name', 'phone', 'password'], 'string', 'max' => 255],
            ['phone', function ($attribute, $params, $validator) {
                if (User::find()->where(['phone' => $this->phone])->exists())
                    $this->addError($attribute, 'This phone number already exists.');
            }],
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'car_id' => 'Машина',
            'name' => 'Имя',
            'password' => 'Пароль',
            'email' => 'Почта',
            'phone' => 'Телефон',
            'additional_info' => 'Доп. информация',
        ];
    }
    public function getCars()
    {
        return $this->hasOne(Cars::class, ['id' => 'car_id']);
    }

    public static function findCar($id){
        if (!empty(\common\models\Cars::find()->select('client_id')->where(['client_id' => $id])->one()['client_id'])){
            return \common\models\Cars::find()->select('name')->where(['client_id' => $id])->one()['name'];
        }else{
            return 'Машина не указана';
        }
    }
}
