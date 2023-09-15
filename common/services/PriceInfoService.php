<?php

namespace common\services;

use common\models\Orders;
use common\models\Washer;

class PriceInfoService
{
    public static function makePrices ($model){
        $salaryModel = \common\services\SalaryService::findWasher($model->user_id);
        $prices =[];
        foreach ($model->price as $item){
            $PriceInfoModel = new \common\models\PriceInfo();
            $PriceInfoModel->price_id = $item;
            $PriceInfoModel->order_id = $model->id;
            $PriceInfoModel->save();
        }
        foreach (\common\models\Orders::getPrice($model->id) as $value){
            $prices [] =  $value['price'];
        }
        \common\services\OrdersService::isCash($model->is_cash, array_sum($prices));

        $salaryModel->salary = $salaryModel->salary + Washer::washerSalary($model->user_id, array_sum($prices));

        $salaryModel->save();

        return $prices;
    }
}
