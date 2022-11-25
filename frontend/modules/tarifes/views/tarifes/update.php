<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\tarifes\models\Tarifes $model */

$this->title = 'Изменить прайс: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Изменить', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="tarifes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
