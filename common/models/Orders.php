<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $client_id
 * @property int|null $car_id
 * @property int|null $work_shift_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property float $amount
 * @property float $additional_price
 *
 * @property Cars $car
 * @property Clients $client
 * @property Prices $price
 * @property Prices[] $prices
 * @property User $user
 * @property WorkShifts $workShift
 */
class Orders extends \yii\db\ActiveRecord
{
    public $prettyCreateDate;
    public $prettyUpdateDate;
    public $is_cash;
    public $price;
    public $priceInfo;

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    public static function getStatusLabel()
    {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_DISABLED => 'Не активен',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'client_id', 'car_id', 'work_shift_id', 'status', 'created_at', 'updated_at', 'is_cash'], 'integer'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::class, 'targetAttribute' => ['car_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['client_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['work_shift_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkShifts::class, 'targetAttribute' => ['work_shift_id' => 'id']],
            [['user_id', 'client_id', 'car_id', 'work_shift_id', 'price', 'status'], 'required'],
            [['amount', 'additional_price'], 'double']
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
            'client_id' => 'Клиент',
            'car_id' => 'Машина',
            'work_shift_id' => 'Рабочая смена',
            'priceInfo' => 'Price',
            'status' => 'Статус',
            'is_cash' => 'Расчет наличными',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'amount' => 'Сумма',
            'additional_price' => 'Добавочная стоимость'
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Cars::class, ['id' => 'car_id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Price]].
     *
     * @return \yii\db\ActiveQuery
     */

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[WorkShift]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkShift()
    {
        return $this->hasOne(WorkShifts::class, ['id' => 'work_shift_id']);
    }

    public static function getPriceName($id){
        return \common\models\PriceInfo::find()->select('price_id')->where(['order_id'=>$id])->all();
    }

    public static function getPricesId($id){
        $prices = [];
        foreach (\common\models\PriceInfo::find()->select('price_id')->where(['order_id'=>$id])->all() as $price){
            $prices[] = $price['price_id'];
        }
        return $prices;
    }

    public static function getPrice($id){
        $price = self::getPricesId($id);
         return \common\models\Prices::find()->select('price')->where(['id'=> $price])->all();
    }

    public static function getTarifId($id){
        return \common\models\Prices::find()->select('tarif_id')->where(['id'=>$id])->all();
    }

    public static function getTarifName($id)
    {
        $pricesId = self::getPricesId($id);
        $tarifId = self::getTarifId($pricesId);
        return \common\models\Tarifes::find()->select('name')->where(['id'=>$tarifId])->all();
    }

        public function afterFind()
    {
        parent::afterFind();
        $this->prettyCreateDate = date("d-m-Y H:i", $this->created_at);
        $this->prettyUpdateDate = date("d-m-Y H:i", $this->updated_at);
    }

    public function getPrices()
    {
        return $this->hasMany(Prices::class, ['id' => 'price_id'])->viaTable('price_info', ['order_id' => 'id']);
    }
}
