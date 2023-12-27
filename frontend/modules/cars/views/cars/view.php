<?php

use common\models\Cars;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\cars\models\cars $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Машины', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cars-view">


    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Список', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту машину?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'number',
            'region',
            [
                'attribute' => 'body_type_id',
                'value' => function($model){
                    return $model->bodyType->name;
                }
            ],
            [
                'attribute' => 'photo_id',
                'value' => function($model){return '@web/images/cars/'.$model->photo->path;},
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
                    return Cars::getStatusLabel()[$model->status];
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
