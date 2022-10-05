<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\clients\models\Clients $model */

$this->title = 'Редактировать: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="clients-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
