<?php

namespace common\services;

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
}