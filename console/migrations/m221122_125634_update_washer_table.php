<?php

use yii\db\Migration;

/**
 * Class m221122_125634_update_washer_table
 */
class m221122_125634_update_washer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('washer', 'name', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221122_125634_update_washer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221122_125634_update_washer_table cannot be reverted.\n";

        return false;
    }
    */
}
