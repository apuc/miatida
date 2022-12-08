<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "price_info".
 *
 * @property int $id
 * @property int $order_id
 * @property int $price_id
 *
 * @property Orders $order
 */
class PriceInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'price_id'], 'required'],
            [['order_id', 'price_id'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['order_id' => 'id']],
            [['price_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prices::class, 'targetAttribute' => ['price_id' => 'id']],
        ];
    }

    public static function createOrderPrice($model){

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'price_id' => 'price ID',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::class, ['id' => 'order_id']);
    }

    public function getPrice()
    {
        return $this->hasOne(Prices::class, ['id' => 'price_id']);
    }
}
