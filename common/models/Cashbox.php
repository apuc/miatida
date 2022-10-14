<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cashbox".
 *
 * @property int $id
 * @property int|null $date
 * @property int|null $revenue
 */
class Cashbox extends \yii\db\ActiveRecord
{
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
            'date' => 'Date',
            'revenue' => 'Revenue',
        ];
    }
}
