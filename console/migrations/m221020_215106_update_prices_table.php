<?php

use yii\db\Migration;

/**
 * Class m221020_215106_update_prices_table
 */
class m221020_215106_update_prices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('prices', 'washer_salary', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221020_215106_update_prices_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221020_215106_update_prices_table cannot be reverted.\n";

        return false;
    }
    */
}
