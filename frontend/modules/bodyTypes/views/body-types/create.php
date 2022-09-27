<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\bodyTypes\models\BodyTypes $model */

$this->title = 'Добавить кузов';
$this->params['breadcrumbs'][] = ['label' => 'Кузова', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
