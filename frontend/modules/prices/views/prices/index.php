<?php

use frontend\modules\prices\models\Prices;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\prices\models\PricesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Прейскурант цен';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prices-index">


    <p>
        <?= Html::a('Добавить цену', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'services_id',
                'value' => function($model){
                       return $model->services->name;
                }
            ],
            [
                'attribute' => 'tarif_id',
                'value' => function($model){
                    return $model->tarif->name;
                }
            ],
            [
                'attribute' => 'body_type_id',
                'value' => function($model){
                    return $model->bodyType->name;
                }
            ],
            'price',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Prices $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
