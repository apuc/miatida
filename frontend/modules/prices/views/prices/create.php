<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\prices\models\Prices $model */

$this->title = 'Создать Price';
$this->params['breadcrumbs'][] = ['label' => 'Price', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
