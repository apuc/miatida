<?php

use frontend\modules\paymentSalary\models\PaymentSalary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\paymentSalary\models\PaymentSalarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'История выплат';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-salary-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'user_id',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            'payment',
            [
                'attribute'=>'date',
                'value' => function($model){
                    return $model->prettyDate;
                },
            ],
        ],
    ]); ?>


</div>
