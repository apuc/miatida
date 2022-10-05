<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\settings\models\Settings $model */

$this->title = 'Обновить настройку: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="settings-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
