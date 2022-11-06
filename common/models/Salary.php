<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "salary".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $salary
 *
 * @property User $user
 */
class Salary extends \yii\db\ActiveRecord
{
    public $payment;
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'salary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'payment', 'salary'], 'required'],
            [['payment','salary'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Мойщик',
            'salary' => 'Заработано',
            'payment' => 'Выплатить'
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
