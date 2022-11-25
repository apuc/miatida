<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "work_shifts".
 *
 * @property int $id
 * @property int|null $date
 * @property int|null $user_id
 */
class WorkShifts extends \yii\db\ActiveRecord
{
    public $prettyDate;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_shifts';
    }

//    public function behaviors()
//    {
//        return [
//            'timestamp' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date'],
//                ],
//            ],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'user_id',], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'user_id' => 'Мойщик',
            'salary' => 'зарплата',
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'prettyDate');
    }

    public static function getWorkGroup()
    {
        return array_unique(ArrayHelper::map(self::find()->all(), 'id', 'prettyDate'));

    }


    public function getUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->prettyDate = date("d-m-Y", $this->date);
    }
}