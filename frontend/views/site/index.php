<?php
$this->title = 'Главная';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?= \hail812\adminlte\widgets\Callout::widget([
                'type' => 'info',
                'head' => 'Добро пожаловать!',
                'body' => 'Воспользуйтесь меню слева, для работы с административной панелью'
            ]) ?>
        </div>
    </div>
</div>