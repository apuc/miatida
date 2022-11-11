<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\salary\models\Salary $model */

$this->title = 'Заплатить: ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salary-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
