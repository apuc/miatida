<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\orders\models\Orders $model */

$this->title = 'Создать заказ';
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
