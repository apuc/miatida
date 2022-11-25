<?php

use frontend\modules\salary\models\Salary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\salary\models\SalarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Зарплата';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salary-index">


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
            'salary',
            [
                'class' => ActionColumn::className(),
                'template'=>'{pay}',
                'buttons' => [
                    'pay' => function ($url,$model,$key) {
                        return Html::a('Заплатить', array('update', 'id'=> $model->id), ['class' => 'btn btn-success btn-xs']);
                    },
                ],
                'urlCreator' => function ($action, Salary $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
