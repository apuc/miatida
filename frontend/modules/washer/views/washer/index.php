<?php

use frontend\modules\washer\models\Washer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\modules\washer\models\WasherSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мойщики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="washer-index">

    <p>
        <?= Html::a('Создать мойщика', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'image',
                'value' => function ($model) {
                    return '@web/images/washers/' . $model->image;
                },
                'format' => ['image', ['width' => 100, 'height' => 100]],
            ],
            'name',
            'phone',
            'add_phone',
            'add_phone_owner',
            [
                'attribute' => 'date_birth',
                'value' => function ($model) {
                    return $model->prettyDate;
                },
                'label' => 'Дата рождения'
            ],
            'salary_percent',
            'salary_exit',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Washer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
