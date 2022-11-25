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
    public $revenueAdd;

    /**
     * {@inheritdoc}
     */


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
            [['revenue', 'revenueAdd'], 'integer'],
            [['date'], 'required'],
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
            'revenueAdd' => 'Прибыль'
        ];
    }
    public function afterFind()
    {
        parent::afterFind();
        $this->prettyDate = date("d-m-Y", $this->date);
    }
}
