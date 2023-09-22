<?php

use yii\db\Migration;

/**
 * Class m230922_161841_add_additional_price_field_to_orders_table
 */
class m230922_161841_add_additional_price_field_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders', 'additional_price', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('orders', 'additional_price');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230922_161841_add_additional_price_field_to_orders_table cannot be reverted.\n";

        return false;
    }
    */
}
