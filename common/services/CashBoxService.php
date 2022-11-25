<?php

namespace common\services;

use common\models\CashBox;

class CashBoxService
{
    public static function findDate($date)
    {
        if ((CashBox::findOne(['date' => $date]))) {
            return CashBox::findOne(['date' => $date]);
        }else{
            $cashBoxModel = new CashBox;
            $cashBoxModel->date = $date;
            return $cashBoxModel;
        }

    }
}