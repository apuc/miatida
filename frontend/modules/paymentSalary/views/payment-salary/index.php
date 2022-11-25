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
                    return \common\models\Washer::getWasherName($model->user->id);
                }
            ],
            [
                'attribute' => 'payment',
                'value' => function ($model) {
                    return Html::a($model->payment, array('view',  'id' => $model['user_id']));
                },
                'format' => 'raw',
            ],
            [
                'attribute'=>'date',
                'value' => function($model){
                    return $model->prettyDate;
                },
            ],
        ],
    ]); ?>


</div>
