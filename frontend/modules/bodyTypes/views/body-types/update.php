<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\bodyTypes\models\BodyTypes $model */

$this->title = 'Изменить категорию автомобиля: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Кузовы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="body-types-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
