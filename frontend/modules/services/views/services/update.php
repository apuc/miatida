<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\services\models\Services $model */

$this->title = 'Изменить услугу: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить услугу';
?>
<div class="services-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
