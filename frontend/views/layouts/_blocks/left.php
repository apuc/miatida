<?php

use andrewdanilov\adminpanel\widgets\Menu;

/* @var $this \yii\web\View */
/* @var $siteName string */
/* @var $directoryAsset false|string */

?>

<div class="page-left">
	<div class="sidebar-heading"><?= $siteName ?></div>
	<?= Menu::widget(['items' => [
		['label' => 'System'],
		['label' => 'Users', 'url' => ['/user/index'], 'icon' => 'users'],
        ['label' => 'Modules'],
		['label' => 'Body Types', 'url' => ['/body-types/body-types'], 'icon' => 'users'],
//		['label' => 'Car photos', 'url' => ['/car-photos/car-photos'], 'icon' => 'users'],
		['label' => 'Cars', 'url' => ['/cars/cars'], 'icon' => 'users'],
		['label' => 'Clients', 'url' => ['/clients/clients'], 'icon' => 'users'],
		['label' => 'Orders', 'url' => ['/orders/orders'], 'icon' => 'users'],
		['label' => 'Prices', 'url' => ['/prices/prices'], 'icon' => 'users'],
		['label' => 'Services', 'url' => ['/services/services'], 'icon' => 'users'],
		['label' => 'Settings', 'url' => ['/settings/settings'], 'icon' => 'users'],
		['label' => 'Tarifes', 'url' => ['/tarifes/tarifes'], 'icon' => 'users'],
		['label' => 'Work shifts', 'url' => ['/work-shifts/work-shifts'], 'icon' => 'users'],
	]]) ?>
</div>
