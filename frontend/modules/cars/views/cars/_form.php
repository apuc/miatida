<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\cars\models\cars $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body_type_id')->dropDownList(
        \common\models\BodyTypes::getList(),
        $params = [
            'prompt' => 'Выберите кузов...'
        ]
    );
    $photoModel = new \common\models\CarPhotos;
    ?>

    <?= $form->field($photoModel, 'path')->fileInput() ?>

    <?= $form->field($model, 'client_id')->dropDownList(
        \common\models\Clients::getList(),
        $params = [
            'prompt' => 'Выберите клиента...'
        ]
    ) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Cars::getStatusLabel()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
