<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\modules\workShifts\models\WorkShifts $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Рабочая смена', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="work-shifts-view">


    <p>
<!--        --><?php //= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Список', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту смену?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'prettyDate',
                'label' => 'Дата'
            ],
            [
                'attribute' => 'user_id',
                'value' => function($model){
                    return \common\models\Washer::getWasherName($model->user->id);
                }
            ],
            [
                'attribute' => 'shift',
                'value' => function ($model) {
                    return $model->labelByShift();
                }
            ],
        ],
    ]) ?>

</div>
