<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cashbox}}`.
 */
class m221014_111611_create_cashbox_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cashbox}}', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(11)->defaultValue(0),
            'revenue' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cashbox}}');
    }
}
