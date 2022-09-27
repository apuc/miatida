<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\workShifts\models\WorkShifts $model */

$this->title = 'Изменить рабочие смены: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Рабочая смена', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="work-shifts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
