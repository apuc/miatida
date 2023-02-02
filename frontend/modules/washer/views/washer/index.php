<?php

use frontend\modules\washer\models\Washer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

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

<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container-fluid" style="width: 100%">
        <div class="row">
    <?php foreach ($cardModel as $value){?>
        <div class="card" style="width: 18rem; margin-right: 13px;">
            <img style="height:200px;" class="card-img-top" src=" <?= '/images/washers/' . $value['image']?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Имя: <?=$value['name']?></h5>
                <p class="card-text"> Номер <?=$value['phone']?></p>
                <a href="view?id=<?=$value['id']?>" type="button" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></a>
                <a href="update?id=<?=$value['id']?>" type="button" class="btn btn-primary btn-circle"><i class="fas fa-pen"></i></a>
                <a href="delete?id=<?=$value['id']?>" type="button" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>

            </div>
        </div>
    <?php }?>
        </div>
    </div>


<!---->
<!--    --><?php //= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            [
//                'attribute' => 'image',
//                'value' => function ($model) {
//                    return '@web/images/washers/' . $model->image;
//                },
//                'format' => ['image', ['width' => 100, 'height' => 100]],
//            ],
//            'name',
//            'phone',
//            'add_phone',
//            'add_phone_owner',
//            [
//                'attribute' => 'date_birth',
//                'value' => function ($model) {
//                    return $model->prettyDate;
//                },
//                'label' => 'Дата рождения'
//            ],
//            'salary_percent',
//            'salary_exit',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Washer $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                }
//            ],
//        ],
//    ]); ?>


</div>
