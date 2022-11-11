<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prices".
 *
 * @property int $id
 * @property int $services_id
 * @property int $tarif_id
 * @property int $body_type_id
 * @property int $washer_salary
 * @property int|null $price
 *
 * @property BodyTypes $bodyType
 * @property Services $services
 * @property Tarifes $tarif
 */
class Prices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['washer_salary'], 'integer'],
            [['services_id', 'tarif_id', 'body_type_id'], 'required'],
            [['services_id', 'tarif_id', 'body_type_id', 'price'], 'integer'],
            [['body_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BodyTypes::class, 'targetAttribute' => ['body_type_id' => 'id']],
            [['services_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['services_id' => 'id']],
            [['tarif_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tarifes::class, 'targetAttribute' => ['tarif_id' => 'id']],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'services_id' => 'Услуги',
            'tarif_id' => 'Тариф',
            'body_type_id' => 'Кузов',
            'price' => 'Стоимость',
            'washer_salary' => 'Зарплата мойщику'
        ];
    }

    /**
     * Gets query for [[BodyType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBodyType()
    {
        return $this->hasOne(BodyTypes::class, ['id' => 'body_type_id']);
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'price');
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasOne(Services::class, ['id' => 'services_id']);
    }

    /**
     * Gets query for [[Tarif]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarif()
    {
        return $this->hasOne(Tarifes::class, ['id' => 'tarif_id']);
    }
}
