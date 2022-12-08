<?php

use yii\db\Migration;

/**
 * Class m221207_213524_update_orders_info_table
 */
class m221207_213524_update_orders_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-orders-price_id', 'orders');
        $this->dropColumn('orders', 'price_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221207_213524_update_orders_info_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221207_213524_update_orders_info_table cannot be reverted.\n";

        return false;
    }
    */
}
