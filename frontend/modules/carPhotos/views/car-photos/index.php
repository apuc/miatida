<?php

use frontend\modules\carPhotos\models\CarPhotos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\carPhotos\models\CarPhotosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Фото машин';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-photos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить фото машины', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'path',
                'value' => function($model){return '@web/images/cars/' . $model->path;},
                'format' => ['image', ['width' => 100, 'height' => 100]],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CarPhotos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
