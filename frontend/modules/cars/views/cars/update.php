<?php

use yii\helpers\Html;
use kartik\widgets\FileInput;


/** @var yii\web\View $this */
/** @var frontend\modules\cars\models\cars $model */

$this->title = 'Изменить машину: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Машины', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="cars-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
