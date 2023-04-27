<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\cars\models\cars $model */
/** @var frontend\modules\carPhotos\models\CarPhotos $modelPhoto */

$this->title = 'Добавить машину';
$this->params['breadcrumbs'][] = ['label' => 'Машины', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelPhoto' => $modelPhoto
    ]) ?>

</div>
