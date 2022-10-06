<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\settings\models\Settings $model */

$this->title = 'Создать настройку';
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
