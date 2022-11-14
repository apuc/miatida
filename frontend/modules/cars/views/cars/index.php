<?php

use frontend\modules\cars\models\cars;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\cars\models\CarsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Машины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-index">


    <p>
        <?= Html::a('Добавить машину', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'body_type_id',
                'value' => function($model){
                    return $model->bodyType->name;
                }
            ],
            [
                'attribute' => 'photo_id',
                'value' => function($model){return '@web/images/cars/' . $model->photo->path;},
                'format' => ['image', ['width' => 100, 'height' => 100]],
            ],
            [
                'attribute' => 'client_id',
                'value' => function($model){
                    return $model->client->name;
                }
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return \common\models\Cars::getStatusLabel()[$model->status];
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, cars $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
