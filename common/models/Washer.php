<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "washer".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $image
 * @property string|null $phone
 * @property string|null $add_phone
 * @property string|null $date_birth
 * @property int|null $salary_percent
 * @property int|null $salary_exit
 * @property int|null $add_phone_owner
 * @property int|null $name
 *
 * @property User $user
 */
class Washer extends \yii\db\ActiveRecord
{
    public $password;
    public $email;
    /**
     * @var false|string
     */
    public $prettyDate;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'washer';
    }

//    public function behaviors()
//    {
//        return [
//            'timestamp' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_birth'],
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
            [['user_id', 'image', 'name', 'password', 'salary_percent', 'add_phone_owner', 'salary_exit', 'add_phone', 'date_birth', 'phone'], 'required'],
            [['user_id', 'salary_percent'], 'integer'],
            [['image', 'email', 'name'], 'string'],
            [['phone', 'add_phone', 'date_birth'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Почта',
            'name' => 'Имя',
            'password' => 'Пароль',
            'user_id' => 'User ID',
            'image' => 'Фото',
            'phone' => 'Телефон',
            'add_phone' => 'Доп. Телефон',
            'date_birth' => 'дата рождения',
            'salary_percent' => 'Процентная ставка',
            'add_phone_owner' => 'Чей номер',
            'salary_exit' => 'Зарплата за выход',
        ];
    }

    public static function washerSalary($id, $price){
        return self::findWasherSalaryPerPercent($id) * $price / 100;
    }

    public static function findWasherSalaryPerPercent($id){
        return self::find()->select('salary_percent')->where(['user_id' => $id])->one()['salary_percent'];
    }

    public static function findWasherSalaryPerExit($id){
        return self::find()->select('salary_exit')->where(['user_id' => $id])->one()['salary_exit'];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public static function getList(){
        return ArrayHelper::map(self::find()->all(), 'user_id', 'name');
    }

    public static function getWasherName($id){
        if (self::find()->select('name')->where(['user_id' => $id])->one()){
            return self::find()->select('name')->where(['user_id' => $id])->one()['name'];
        }else{
            return "Мойщик удален";
        }
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->prettyDate = date("d-m-Y", $this->date_birth);
    }
}
