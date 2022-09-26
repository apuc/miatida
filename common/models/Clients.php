<?php

namespace common\models;

use Yii;

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
            [['user_id'], 'integer'],
            [['additional_info'], 'string'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'additional_info' => 'Доп. информация',
        ];
    }
}
