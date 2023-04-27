<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\washer\models\Washer $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Мойщик', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="washer-view">
    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Список', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'image',
                'value' => function($model){return $model->image;},
                'format' => ['image', ['width' => 100, 'height' => 100]],
            ],
            'name',
            'phone',
            'add_phone',
            'add_phone_owner',
            [
                'attribute' => 'date_birth',
                'value' => function($model){
                    return $model->prettyDate;
                },
                'label' => 'Дата рождения'
            ],
            'salary_percent',
            'salary_exit',
        ],
    ]) ?>

</div>
