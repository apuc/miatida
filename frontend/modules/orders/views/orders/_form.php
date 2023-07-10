<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\orders\models\Orders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>
    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-client']) ?>
    <?= $form->field($model, 'client_id')->dropDownList(
        \common\models\Clients::getList(),
        [
            'onchange' => "$.pjax.reload({container: '#pjax-client',type: 'get', url: '\yii\helpers\Url::to(['/'])', data: {client_id: $(this).val()}});",
            'prompt' => 'Выберите клиента...',
            'value' => Yii::$app->request->get('client_id'),
        ],
    )
    ?>
    <?php
    if (Yii::$app->request->get('client_id')) {
        echo $form->field($model, 'car_id')->dropDownList(
            \common\models\Cars::getClientCarList(Yii::$app->request->get('client_id')),
            [
                'onchange' => "$.pjax.reload({container: '#pjax-client',type: 'get', url: '\yii\helpers\Url::to(['/'])', data: {car_id: $(this).val()}});",
                'prompt' => 'Выберите машину...',
                'value' => Yii::$app->request->get('car_id'),
            ]
        );
    }
    ?>

    <?= $form->field($model, 'work_shift_id')->dropDownList(
        \common\models\WorkShifts::getWorkGroup(),
        [
            'onchange' => "$.pjax.reload({container: '#pjax-client',type: 'get', url: '\yii\helpers\Url::to(['/'])', data: {work_shift_id: $(this).val()}});",
            'prompt' => 'Выберите рабочую смену...',
            'value' => Yii::$app->request->get('work_shift_id'),
        ],
    ) ?>
    <?php
    if (Yii::$app->request->get('work_shift_id')) {
        echo $form->field($model, 'user_id')->dropDownList(
            \common\models\WorkShifts::getWashersPerGroup(Yii::$app->request->get('work_shift_id')),
            $params = [
                'onchange' => "$.pjax.reload({container: '#pjax-client',type: 'get', url: '\yii\helpers\Url::to(['/'])', data: {user_id: $(this).val()}});",
                'prompt' => 'Выберите мойщика...',
                'value' => Yii::$app->request->get('user_id'),
            ]
        );
    }
    ?>


    <?php \yii\widgets\Pjax::end() ?>
    <?php
    if (\common\models\Prices::getList() == null) {
        echo '<div class="alert alert-danger" role="alert">
                PRICE не найден
              </div>';
    } else {
        echo $form->field($model, 'price[]')->widget(\kartik\select2\Select2::className(),
            [
                'data' => \common\models\Prices::getList(),
            ]
        )->label('Прейскурант цен');
    }
    ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Services::getStatusLabel()) ?>

    <?= $form->field($model, 'is_cash')->checkbox(['value' => '1', 'checked ' => true])->label(''); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
