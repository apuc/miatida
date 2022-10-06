<?php

use common\models\Services;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\services\models\Services $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Услуга', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">


    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Список', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить эту услугу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return Services::getStatusLabel()[$model->status];
                }
            ],
            [
                'attribute' => 'prettyCreateDate',
                'label' => 'Дата и время создания'
            ],
            [
                'attribute' => 'prettyUpdateDate',
                'label' => 'Дата и время редактирования'
            ]
        ],
    ]) ?>

</div>
