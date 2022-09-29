<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var frontend\modules\prices\models\Prices $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prices-form">
<!--    <pre>-->
<!--    --><?php
//    print_r(['data' => \common\models\Services::getList()]);
//    die();
//    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'services_id')->dropDownList(
            \common\models\Services::getList(),
            $params = [
                    'prompt' => 'Выберите услугу...'
            ]
    )?>

    <?= $form->field($model, 'tarif_id')->dropDownList(
        \common\models\Tarifes::getList(),
        $params = [
            'prompt' => 'Выберите тариф...'
        ]
    )?>

    <?= $form->field($model, 'body_type_id')->dropDownList(
        \common\models\BodyTypes::getList(),
        $params = [
            'prompt' => 'Выберите тип кузова...'
        ]
    )?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
