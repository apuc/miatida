<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%prices}}`.
 */
class m230913_231134_add_is_dynamic_price_column_to_prices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('prices', 'is_dynamic_price', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('prices', 'is_dynamic_price',);
    }
}
