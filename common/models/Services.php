<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string|null $name
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $prettyCreateDate
 */
class Services extends \yii\db\ActiveRecord
{
    public $prettyCreateDate;
    public $prettyUpdateDate;

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    /**
     * @return string[]
     */
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
    public static function tableName()
    {
        return 'services';
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
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'status' => 'Статус',
            'created_at' => 'Создано',
            'updated_at' => 'Измененно',
        ];
    }


    public function afterFind()
    {
        parent::afterFind();
        $this->prettyCreateDate = date("d-m-Y H:i", $this->created_at);
        $this->prettyUpdateDate = date("d-m-Y H:i", $this->updated_at);
    }
}
