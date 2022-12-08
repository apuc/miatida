<?php

use common\models\Orders;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\orders\models\Orders $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">


    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Список', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно уверены что хотите удалить этот заказ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => function($model){
                    return \common\models\Washer::getWasherName($model->user->id);
                }
            ],
            [
                'attribute' => 'client_id',
                'value' =>  $model->client->name
            ],
            [
                'attribute' => 'Price',
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
                'value' =>  $model->car->name
            ],
            [
                'attribute' => 'work_shift_id',
                'value' =>  $model->workShift->prettyDate
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return Orders::getStatusLabel()[$model->status];
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => $model->prettyCreateDate,
                'label' => 'Дата и время создания'
            ],
            [
                'attribute' => 'updated_at',
                'value' => $model->prettyUpdateDate,
                'label' => 'Дата и время редактирования'
            ]
        ],
    ]) ?>

</div>
