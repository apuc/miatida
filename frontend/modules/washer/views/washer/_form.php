<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\modules\washer\models\Washer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="washer-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--    --><?php //=InputFile::widget([
    //        'language' => 'ru',
    //        'controller' => 'elfinder',
    //        'filter' => 'image',
    //        'name' => 'Washer[image]',
    //        'id' => 'washer-image',
    //        'template' => '<div class="input-group">{input}<span class="span-btn">{button}</span></div>',
    //        'options' => ['class' => 'form-control itemImg banner_update_on_change', 'maxlength' => '255'],
    //        'buttonOptions' => ['class' => 'btn btn-primary'],
    //        'value' => $model->image,
    //        'buttonName' => 'Выбрать фотографию',
    //    ]);
    //    ?>

    <?= $form->field($model, 'image')->fileInput()->widget(FileInput::class, [
        'pluginOptions' => [
            'showZoom' => false,
            'initialPreview' => [
                $model->image != null ? Html::img('@web/images/washers/' . $model->image, ['class' => 'file-preview-image']) : null,
            ],
            'overwriteInitial' => true,
            'showCaption' => false,
            'showUpload' => false,
            'showRemove' => true,
            'showDetails' => true,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="fa fa-camera"></i> ',
            'browseLabel' => 'Выберите фото',
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_phone_owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_birth')->widget(\kartik\widgets\DatePicker::className(), [
        'options' => [
            'placeholder' => 'Enter event time ...',
            'value' => date('d.m.Y', $model->date_birth),
        ],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]) ?>

<!--    --><?php //= $form->field($model, 'date_birth')->input('date', ['value' => date('d.m.Y', $model->date_birth)]) ?>

    <?= $form->field($model, 'salary_exit')->textInput() ?>

    <?= $form->field($model, 'salary_percent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
