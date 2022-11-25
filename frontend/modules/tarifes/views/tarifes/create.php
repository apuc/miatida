<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\tarifes\models\Tarifes $model */

$this->title = 'Создать прайс';
$this->params['breadcrumbs'][] = ['label' => 'Тарифы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifes-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
