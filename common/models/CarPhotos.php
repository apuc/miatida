<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "car_photos".
 *
 * @property int $id
 * @property string|null $path
 */
class CarPhotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path'], 'string'],
            [['path'], 'required'],
            [['path'], 'file', 'extensions' => 'jpg, png, jpeg', 'wrongExtension' => 'Только форматы jpg, png, jpeg']
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'path');
    }

    public static function getItem($model)
    {
        $item = CarPhotos::find()->select('path')->where(['id' => $model->photo_id])->one();
        return $item->path;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Фото',
        ];
    }

}
