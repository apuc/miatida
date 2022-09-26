<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\clients\models\Clients $model */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
