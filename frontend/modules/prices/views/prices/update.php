<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\prices\models\Prices $model */

$this->title = 'Изменить Price: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Стоимость', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="prices-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
