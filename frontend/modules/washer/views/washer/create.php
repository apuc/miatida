<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\washer\models\Washer $model */

$this->title = 'Создать мойщика';
$this->params['breadcrumbs'][] = ['label' => 'Мойщики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="washer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
