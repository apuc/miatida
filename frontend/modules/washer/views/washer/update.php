<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\washer\models\Washer $model */

$this->title = 'Update Washer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Washers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="washer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
