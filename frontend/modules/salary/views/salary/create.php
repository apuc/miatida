<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\modules\salary\models\Salary $model */

$this->title = 'Create Salary';
$this->params['breadcrumbs'][] = ['label' => 'Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
