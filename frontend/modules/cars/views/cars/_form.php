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

    <?= $form->field($model, 'body_type_id')->dropDownList(
        \common\models\BodyTypes::getList(),
        $params = [
            'prompt' => 'Выберите категорию авто...'
        ]
    );
//    $photoModel = new \common\models\CarPhotos;
    ?>

    <?=InputFile::widget([
        'language' => 'ru',
        'controller' => 'elfinder',
        'filter' => 'image',
        'name' => 'CarPhotos[path]',
        'id' => 'washer-image',
        'template' => '<div class="input-group">{input}<span class="span-btn">{button}</span></div>',
        'options' => ['class' => 'form-control itemImg banner_update_on_change', 'maxlength' => '255'],
        'buttonOptions' => ['class' => 'btn btn-primary'],
        'value' => $modelPhoto->path,
        'buttonName' => 'Выбрать фотографию',
    ]);
    ?>

<!--    --><?php //=  $form->field($photoModel, 'path')->fileInput()->widget(FileInput::class, [
//        'pluginOptions' => [
//            'initialPreviewAsData' => $photoModel->path,
//            'showZoom' => false,
//            'initialPreview' => [
//            $model->photo != null ? Html::img('@web/images/cars/' . $model->photo->path, ['class' => 'file-preview-image']):null,
//            ],
//            'overwriteInitial' => true,
//            'showCaption' => false,
//            'showRemove' => true,
//            'showDetails' => true,
//            'browseClass' => 'btn btn-primary btn-block',
//            'browseIcon' => '<i class="fa fa-camera"></i> ',
//            'browseLabel' => 'Выберите фото',
//        ],
//
//    ]); ?>

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
