<?php

use dosamigos\multiselect\MultiSelect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\workShifts\models\WorkShifts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="work-shifts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->input('date') ?>
    <!--    \common\models\Washer::getList(),-->

    <?= $form->field($model, 'user_id[]')->widget(MultiSelect::className(), [
        'data' => \common\models\Washer::getList(),
        'name' => 'bank',
        'clientOptions' => ['maxHeight' => 300,
            'buttonWidth' => '100%',

        ],
        'options' => ['multiple' => true]]);
    ?>

    <?php
    $salaryModel = new \common\models\Salary();
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
