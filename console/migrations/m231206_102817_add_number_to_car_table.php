<?php

use yii\db\Migration;

/**
 * Class m231206_102817_add_number_to_car_table
 */
class m231206_102817_add_number_to_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cars', 'number', $this->string());
        $this->addColumn('cars', 'region', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('cars', 'region');
        $this->dropColumn('cars', 'number');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231206_102817_add_number_to_car_table cannot be reverted.\n";

        return false;
    }
    */
}
