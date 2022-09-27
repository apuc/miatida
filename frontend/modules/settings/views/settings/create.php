<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\settings\models\Settings $model */

$this->title = 'Создать настройку';
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
