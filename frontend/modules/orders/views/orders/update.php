<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\orders\models\Orders $model */

$this->title = 'Изменить заказ: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Заказ';
?>
<div class="orders-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
