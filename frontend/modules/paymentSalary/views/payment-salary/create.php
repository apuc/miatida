<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\paymentSalary\models\PaymentSalary $model */

$this->title = 'Create Payment Salary';
$this->params['breadcrumbs'][] = ['label' => 'Payment Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-salary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
