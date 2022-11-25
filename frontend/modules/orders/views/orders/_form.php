<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\orders\models\Orders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'user_id')->dropDownList(
        \common\models\Washer::getList(),
        $params = [
            'prompt' => 'Выберите мойщика...',
        ]
    ) ?>

    <?= $form->field($model, 'client_id')->dropDownList(
        \common\models\Clients::getList(),
        $params = [
            'prompt' => 'Выберите клиента...'
        ]
    ) ?>

    <?= $form->field($model, 'price_id')->dropDownList(
        \common\models\Prices::getList(),
        $params = [
            'prompt' => 'Выберите price...'
        ]
    ) ?>

    <?= $form->field($model, 'car_id')->dropDownList(
        \common\models\Cars::getList(),
        $params = [
            'prompt' => 'Выберите машину...'
        ]
    ) ?>

    <?= $form->field($model, 'work_shift_id')->dropDownList(
        \common\models\WorkShifts::getWorkGroup(),
        $params = [
            'prompt' => 'Выберите рабочую смену...'
        ]
    ) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Services::getStatusLabel()) ?>

    <?=$form->field($model, 'is_cash')->checkbox([ 'value' => '1', 'checked ' => true])->label('');?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
