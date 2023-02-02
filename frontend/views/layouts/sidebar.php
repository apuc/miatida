<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Админ - панель</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
<!--        <div class="form-inline">-->
<!--            <div class="input-group" data-widget="sidebar-search">-->
<!--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">-->
<!--                <div class="input-group-append">-->
<!--                    <button class="btn btn-sidebar">-->
<!--                        <i class="fas fa-search fa-fw"></i>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    ['label' => 'Приложение', 'header' => true],
                    ['label' => 'Настройки', 'url' => ['/settings/settings'], 'icon' => 'users'],
                    ['label' => 'Пользователи', 'url' => ['/user/index'], 'icon' => 'users'],
                    ['label' => 'Модули', 'header' => true],
                    ['label' => 'Категория автомобиля', 'url' => ['/body-types/body-types'], 'icon' => 'users'],
                    ['label' => 'Машины', 'url' => ['/cars/cars'], 'icon' => 'users'],
                    ['label' => 'Клиенты', 'url' => ['/clients/clients'], 'icon' => 'users'],
                    ['label' => 'Мойщики', 'url' => ['/washer/washer'], 'icon' => 'users'],
                    ['label' => 'Заказы', 'url' => ['/orders/orders'], 'icon' => 'users'],
                    ['label' => 'Prices', 'url' => ['/prices/prices'], 'icon' => 'users'],
                    ['label' => 'Услуги', 'url' => ['/services/services'], 'icon' => 'users'],
                    ['label' => 'Прайсы', 'url' => ['/tarifes/tarifes'], 'icon' => 'users'],
                    ['label' => 'Рабочии смены', 'url' => ['/work-shifts/work-shifts'], 'icon' => 'users'],
                    ['label' => 'Зарплата', 'url' => ['/salary/salary'], 'icon' => 'users'],
                    ['label' => 'История выплат', 'url' => ['/payment-salary/payment-salary'], 'icon' => 'users'],
                    ['label' => 'Касса', 'url' => ['/cash-box/cash-box'], 'icon' => 'users'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>