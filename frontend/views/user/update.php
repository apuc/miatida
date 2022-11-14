<?php

/* @var $this \yii\web\View */
/* @var $model User */

use andrewdanilov\adminpanel\models\User;

if ($model->isNewRecord) {
	$this->title = 'Новый пользователь';
} else {
	$this->title = 'Редактирование пользователя ' . $model->username;
}
?>
<?php $form = \yii\widgets\ActiveForm::begin() ?>

<?= $form->field($model, 'username')->textInput() ?>

<?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>

<?= $form->field($model, '_password')->textInput(['type' => 'password']) ?>

<?= $form->field($model, 'status')->dropDownList(User::getStatuses()) ?>

<?= $form->field($model, 'role')->dropDownList(\common\models\User::getRolesList()) ?>

<?= \yii\helpers\Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

<?php \yii\widgets\ActiveForm::end() ?>
