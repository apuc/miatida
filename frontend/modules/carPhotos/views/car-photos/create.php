<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\carPhotos\models\CarPhotos $model */

$this->title = 'Добавить фото машины';
$this->params['breadcrumbs'][] = ['label' => 'Фото машины', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-photos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
