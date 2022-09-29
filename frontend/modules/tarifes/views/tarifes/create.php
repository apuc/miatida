<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\tarifes\models\Tarifes $model */

$this->title = 'Создать тариф';
$this->params['breadcrumbs'][] = ['label' => 'Тарифы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
