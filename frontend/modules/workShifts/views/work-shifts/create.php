<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\workShifts\models\WorkShifts $model */

$this->title = 'Создать смену';
$this->params['breadcrumbs'][] = ['label' => 'Рабочая смена', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-shifts-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
