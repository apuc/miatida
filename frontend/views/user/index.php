<?php

/* @var $this \yii\web\View */
/* @var $searchModel UserSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Пользователи';

use yii\grid\GridView;
use andrewdanilov\adminpanel\models\User;
use frontend\models\UserSearch;

?>

    <div class="form-group">
        <?= \yii\helpers\Html::a('Новый пользователь', ['update'], ['class' => 'btn btn-success']) ?>
    </div>
<?= GridView::widget([
    'filterModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'username',
        'email',
        [
            'attribute' => 'phone',
            'label' => 'Телефон',
            'value' => function(User $model) {
                return $model->phone;
            }
        ],
        [
            'attribute' => 'status',
            'value' => function(User $model) {
                $statuses = User::getStatuses();
                return $statuses[$model->status];
            },
            'filter' => User::getStatuses(),
        ],
        [
            'attribute' => 'Роль',
            'value' => function(User $model) {
                return \common\models\User::getRole($model->id);
            }
        ],
        [
            'class' => \andrewdanilov\gridtools\FontawesomeActionColumn::class,
            'template' => '{update}{delete}',
        ],

    ]
]) ?>