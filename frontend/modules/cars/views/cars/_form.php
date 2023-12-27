<?php

use kartik\widgets\FileInput;
use mihaildev\elfinder\InputFile;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\cars\models\cars $model */
/** @var yii\widgets\ActiveForm $form */
/** @var frontend\modules\carPhotos\models\carPhotos $modelPhoto */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['type' => 'number', 'maxlength' => true]) ?>

    <?= $form->field($model, 'body_type_id')->dropDownList(
        \common\models\BodyTypes::getList(),
        $params = [
            'prompt' => 'Выберите категорию авто...'
        ]
    );
    $photoModel = new \common\models\CarPhotos;
    ?>
    <?=  $form->field($photoModel, 'path')->fileInput()->widget(FileInput::class, [
        'pluginOptions' => [
            'initialPreviewAsData' => $photoModel->path,
            'showZoom' => false,
            'initialPreview' => [
            $model->photo != null ? Html::img('@web/images/cars/' . $model->photo->path, ['class' => 'file-preview-image']):null,
            ],
            'overwriteInitial' => true,
            'showCaption' => false,
            'showRemove' => true,
            'showDetails' => true,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="fa fa-camera"></i> ',
            'browseLabel' => 'Выберите фото',
        ],

    ]); ?>

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
