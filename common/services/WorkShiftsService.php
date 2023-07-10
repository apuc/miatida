<?php

namespace common\services;

use common\models\Salary;
use frontend\modules\workShifts\models\WorkShifts;

class WorkShiftsService
{
    public static function createWorkShiftGroup($model){
//        echo "<pre>";
//        print_r($model);
//        echo "</pre>";die();
        $date = $model->date;
        $shift = $model->shift;
        foreach ($model->user_id as $item){
            $salaryModel = \common\services\SalaryService::findWasher($item);
            $salaryModel->salary = $salaryModel->salary + \common\models\Washer::findWasherSalaryPerExit($item);
            $model->date = strtotime($date);
            $model->user_id = $item;
            $model->shift = $shift;
            $salaryModel->save();
            $model->save();
            $model = new WorkShifts();
        }
    }
}