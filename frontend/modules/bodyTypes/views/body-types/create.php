<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\bodyTypes\models\BodyTypes $model */

$this->title = 'Добавить категорию автомобиля';
$this->params['breadcrumbs'][] = ['label' => 'Кузова', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-types-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
