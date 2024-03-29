<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "work_shifts".
 *
 * @property int $id
 * @property int $date
 * @property int $user_id
 * @property int $shift
 */
class WorkShifts extends \yii\db\ActiveRecord
{
    public $prettyDate;
    public $name;
    public $washer_id;

    protected const SHIFT_1 = 1;
    protected const SHIFT_2 = 2;
    protected const SHIFT_3 = 3;

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
            [['date', 'user_id', 'shift'], 'required'],
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
            'shift' => 'Смена'
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

    public static function getWashersPerGroup($id)
    {
        $date = self::find()->select('date')->where(['id' => $id])->one()['date'];
        return ArrayHelper::map(self::find()
            ->select(['washer.user_id AS washer_id', 'washer.name', 'work_shifts.id', 'work_shifts.date', 'work_shifts.user_id'])
            ->leftJoin('washer', 'work_shifts.user_id = washer.user_id')
            ->where(['date' => $date])->all(), 'washer_id', 'name');
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

    public function washersWithUserId()
    {
        return ArrayHelper::map(Washer::find()->all(), 'user_id', 'name');
    }

    public function washersByDate()
    {
        $work_shifts = self::findAll(['date' => $this->date]);
        $array = [];
        foreach ($work_shifts as $shift)
        {
            $array[$shift->user_id] = Washer::findOne(['user_id' => $shift->user_id])->name;
        }
        return $array;
    }

    public function shiftsWithlabels()
    {
        return [
            self::SHIFT_1 => '9:00 - 20:00',
            self::SHIFT_2 => '20:00 - 9:00',
            self::SHIFT_3 => '9:00 - 9:00',
        ];
    }

    public function labelByShift()
    {
        if ($this->shift == 1)
            return '9:00 - 20:00';
        if ($this->shift == 2)
            return '20:00 - 9:00';
        if ($this->shift == 3)
            return '9:00 - 9:00';
    }
}