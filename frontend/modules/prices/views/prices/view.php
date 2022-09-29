<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\prices\models\Prices $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Стоимость', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prices-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Список', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить эту стоимость',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'services_id',
                'value' => $model->services->name
            ],
            [
                'attribute' => 'tarif_id',
                'value' => $model->tarif->name
            ],
            [
                'attribute' => 'body_type_id',
                'value' => $model->bodyType->name
            ],
            'price',
        ],
    ]) ?>

</div>
