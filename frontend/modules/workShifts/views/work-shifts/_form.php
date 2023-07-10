<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\workShifts\models\WorkShifts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="work-shifts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->input('date') ?>

    <?= $form->field($model, 'user_id[]')->widget(\kartik\select2\Select2::className(),
        [
            'data' => $model->washersWithUserId(),
            'options' => ['multiple' => true]
        ]);
    ?>

    <?php
    $salaryModel = new \common\models\Salary();
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
