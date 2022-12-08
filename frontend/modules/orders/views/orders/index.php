<?php

use frontend\modules\orders\models\Orders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\orders\models\OrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">


    <p>
        <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                'attribute' => 'client_id',
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
                'attribute' => 'car_id',
                'value' => function($model){
                    return $model->car->name;
                }
            ],
            [
                'attribute' => 'work_shift_id',
                'value' => function($model){
                    return $model->workShift->prettyDate;
                }
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return Orders::getStatusLabel()[$model->status];
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model){
                    return $model->prettyCreateDate;
                },
                'label' => 'Дата и время создания'
            ],

            [
                'attribute' => 'updated_at',
                'value' => function($model){
                    return $model->prettyUpdateDate;
                },
                'label' => 'Дата и время редактирования'
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Orders $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
