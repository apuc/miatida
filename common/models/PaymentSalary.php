<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payment_salary".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $date
 * @property int|null $payment
 *
 * @property User $user
 */
class PaymentSalary extends \yii\db\ActiveRecord
{
    /**
     * @var false|string
     */
    public $prettyDate;


    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_salary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'date', 'payment'], 'integer'],
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
            'date' => 'Дата',
            'payment' => 'Выплата',
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
    
    public function afterFind()
    {
        parent::afterFind();
        $this->prettyDate = date("d-m-Y H:i", $this->date);
    }
}
