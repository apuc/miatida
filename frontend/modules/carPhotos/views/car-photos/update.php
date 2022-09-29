<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\carPhotos\models\CarPhotos $model */

$this->title = 'Изменить фото машины: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Фото машин', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="car-photos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
