<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cashbox".
 *
 * @property int $id
 * @property int|null $date
 * @property int|null $revenue
 */
class CashBox extends \yii\db\ActiveRecord
{
    /**
     * @var false|string
     */
    public $prettyDate;

    /**
     * {@inheritdoc}
     */

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

    public static function tableName()
    {
        return 'cashbox';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'revenue'], 'integer'],
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
            'revenue' => 'Прибыль',
        ];
    }
    public function afterFind()
    {
        parent::afterFind();
        $this->prettyDate = date("d-m-Y", $this->date);
    }
}
