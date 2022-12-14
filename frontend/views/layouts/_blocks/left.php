<?php

use andrewdanilov\adminpanel\widgets\Menu;

/* @var $this \yii\web\View */
/* @var $siteName string */
/* @var $directoryAsset false|string */

?>

<div class="page-left">
	<div class="sidebar-heading"><?= $siteName ?></div>
	<?= Menu::widget(['items' => [
		['label' => 'Приложение'],
        ['label' => 'Настройки', 'url' => ['/settings/settings'], 'icon' => 'users'],
        ['label' => 'Пользователи', 'url' => ['/user/index'], 'icon' => 'users'],
        ['label' => 'Модули'],
		['label' => 'Категория автомобиля', 'url' => ['/body-types/body-types'], 'icon' => 'users'],
//		['label' => 'Car photos', 'url' => ['/car-photos/car-photos'], 'icon' => 'users'],
		['label' => 'Машины', 'url' => ['/cars/cars'], 'icon' => 'users'],
		['label' => 'Клиенты', 'url' => ['/clients/clients'], 'icon' => 'users'],
		['label' => 'Мойщики', 'url' => ['/washer/washer'], 'icon' => 'users'],
		['label' => 'Заказы', 'url' => ['/orders/orders'], 'icon' => 'users'],
		['label' => 'Prices', 'url' => ['/prices/prices'], 'icon' => 'users'],
		['label' => 'Услуги', 'url' => ['/services/services'], 'icon' => 'users'],
		['label' => 'Выбор прайса', 'url' => ['/tarifes/tarifes'], 'icon' => 'users'],
		['label' => 'Рабочии смены', 'url' => ['/work-shifts/work-shifts'], 'icon' => 'users'],
		['label' => 'Зарплата', 'url' => ['/salary/salary'], 'icon' => 'users'],
        ['label' => 'История выплат', 'url' => ['/payment-salary/payment-salary'], 'icon' => 'users'],
		['label' => 'Касса', 'url' => ['/cash-box/cash-box'], 'icon' => 'users'],
	]]) ?>
</div>
