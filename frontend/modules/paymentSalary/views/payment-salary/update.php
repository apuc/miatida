<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\paymentSalary\models\PaymentSalary $model */

$this->title = 'Update Payment Salary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Payment Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-salary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
