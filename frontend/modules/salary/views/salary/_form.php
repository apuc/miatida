<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\salary\models\Salary $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salary-form">
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'salary')->textInput(
        ['readonly' => "readonly"]
    ) ?>

    <?= $form->field($model, 'payment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
