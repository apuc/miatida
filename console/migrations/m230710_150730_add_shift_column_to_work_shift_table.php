<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%work_shift}}`.
 */
class m230710_150730_add_shift_column_to_work_shift_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('work_shifts', 'shift', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('work_shifts', 'shift');
    }
}
