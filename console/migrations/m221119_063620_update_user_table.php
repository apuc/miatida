<?php

use yii\db\Migration;

/**
 * Class m221119_063620_update_user_table
 */
class m221119_063620_update_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addColumn('user', 'phone', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221119_063620_update_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221119_063620_update_user_table cannot be reverted.\n";

        return false;
    }
    */
}
