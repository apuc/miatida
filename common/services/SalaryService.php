<?php

namespace common\services;

use common\models\Washer;
use frontend\modules\salary\models\Salary;

class SalaryService
{

    public static function findWasher($id)
    {
        if ((Salary::findOne(['user_id' => $id]))) {
            return Salary::findOne(['user_id' => $id]);
        }else{
            $salaryModel = new Salary();
            $salaryModel->user_id = $id;
            return $salaryModel;
        }
    }

    public static function salaryCount($model, $item){
        $priceModel = \common\models\Prices::find()->select('price')->where(['id' => $item])->one();
        $salaryModel = \common\services\SalaryService::findWasher($model->user_id);
        $salaryModel->salary = $salaryModel->salary + Washer::washerSalary($model->user_id, $priceModel['price']);
        $salaryModel->save();
    }
}
