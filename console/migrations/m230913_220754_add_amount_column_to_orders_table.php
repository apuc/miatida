<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%orders}}`.
 */
class m230913_220754_add_amount_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders', 'amount', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('orders', 'amount');
    }
}
