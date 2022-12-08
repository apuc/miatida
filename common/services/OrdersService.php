<?php

namespace common\services;

class OrdersService
{
    public static function isCash($model, $price){
        if ($model == 1) {
            $cashBoxModel = \common\services\CashBoxService::findDate(strtotime('today midnight'));
            $cashBoxModel->revenue = $cashBoxModel->revenue + $price;
            $cashBoxModel->save();
        }
    }
}