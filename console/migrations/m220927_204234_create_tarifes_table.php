<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tarifes}}`.
 */
class m220927_204234_create_tarifes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tarifes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tarifes}}');
    }
}
