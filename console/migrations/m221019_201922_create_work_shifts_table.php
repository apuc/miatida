<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%work_shifts}}`.
 */
class m221019_201922_create_work_shifts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%work_shifts}}', [
            'id' => $this->primaryKey(),
            'date' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%work_shifts}}');
    }
}
