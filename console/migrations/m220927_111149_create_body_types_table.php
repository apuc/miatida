<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%body_types}}`.
 */
class m220927_111149_create_body_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%body_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%body_types}}');
    }
}
