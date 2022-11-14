<?php

use frontend\modules\workShifts\models\WorkShifts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\workShifts\models\WorkShiftsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Рабочии смены';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-shifts-index">

    <p>
        <?= Html::a('Создать смену', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'date',
                'value' => function($model){
                    return $model->prettyDate;
                }
            ],
            [
                'attribute' => 'user_id',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkShifts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
</div>
