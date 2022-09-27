<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\bodyTypes\models\BodyTypes $model */

$this->title = 'Изменить кузов: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Кузовы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="body-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
