<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $body_type_id
 * @property int $photo_id
 * @property int $client_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property BodyTypes $bodyType
 * @property Clients $client
 * @property CarPhotos $photo
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $prettyCreateDate;
    public $prettyUpdateDate;

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    public static function tableName()
    {
        return 'cars';
    }

    public static function getStatusLabel()
    {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_DISABLED => 'Не активен',
        ];
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body_type_id', 'client_id', 'status', 'created_at', 'updated_at','photo_id'], 'integer'],
            [['photo_id', 'client_id', 'body_type_id'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['body_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BodyTypes::class, 'targetAttribute' => ['body_type_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['client_id' => 'id']],
            [['photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarPhotos::class, 'targetAttribute' => ['photo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'body_type_id' => 'Категория авто',
            'photo_id' => 'Фото',
            'client_id' => 'Клиент',
            'status' => 'Статус',
            'created_at' => 'Создано',
            'updated_at' => 'Обнавленно',
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
     * Gets query for [[Photo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoto()
    {
        return $this->hasOne(CarPhotos::class, ['id' => 'photo_id']);
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public static function getClientCarList($id)
    {
        return ArrayHelper::map(self::find()->where(['client_id'=>$id])->all(), 'id', 'name');
    }



    public function afterFind()
    {
        parent::afterFind();
        $this->prettyCreateDate = date("d-m-Y H:i", $this->created_at);
        $this->prettyUpdateDate = date("d-m-Y H:i", $this->updated_at);
    }
}
