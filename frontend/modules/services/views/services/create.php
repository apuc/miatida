<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\services\models\Services $model */

$this->title = 'Добавить услугу';
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
