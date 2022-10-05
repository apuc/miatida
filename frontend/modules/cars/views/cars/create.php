<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\cars\models\cars $model */

$this->title = 'Добавить машину';
$this->params['breadcrumbs'][] = ['label' => 'Машины', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
