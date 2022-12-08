<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\paymentSalary\models\PaymentSalary $model */

$this->title = \common\models\Washer::getWasherName($model->user->id);
$this->params['breadcrumbs'][] = ['label' => 'Payment Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payment-salary-view">


    <p>
        <?= Html::a('Список', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php
        $orderModel = \common\models\PaymentSalary::findWasherOrders($model->user_id);
    ?>

    <?=
    $content = '';

    foreach(\common\models\PaymentSalary::findWasherOrders($model->id) as $item) {
        $content .= DetailView::widget([
            'model' => $item,
            'attributes' => [
                [
                    'attribute' => 'Машина',
                    'value' => function($model){
                        return $model->car->name;
                    }
                ],
                [
                    'attribute' => 'Клиент',
                    'value' => function($model){
                        return $model->client->name;
                    }
                ],
                [
                    'attribute' => 'price',
                    'value' => function($model){
                        $prices =[];
                        foreach (\common\models\Orders::getPrice($model->id) as $item){
                            $prices [] =  $item['price'];
                        }
                        return implode(',', $prices);
                    }
                ],

                [
                    'attribute' => 'Зарплата за услугу',
                    'value' => function($model){
                        $prices =[];
                        foreach (\common\models\Orders::getPrice($model->id) as $item){
                            $prices [] =  $item['price'];
                        }
                        $full_price = array_sum($prices);
                        return \common\models\Washer::washerSalary($model->user_id, $full_price);

                    }
                ],
                [
                    'attribute' => 'Зарплата за выход',
                    'value' => function($model){
                        return \common\models\Washer::findWasherSalaryPerExit($model->user_id);
                    }
                ]
            ]
        ]);
    }
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => \common\models\Washer::getWasherName($model->user->id),
                'format' => 'raw',
                'value' => $content,
            ],
        ],
    ]);
    ?>


</div>
