<?php

use yii\db\Migration;

/**
 * Class m221018_065615_update_work_shifts_table
 */
class m221019_183454_update_work_shifts_table extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('work_shifts', 'user_id', $this->integer());
        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-work_shifts-user_id}}',
            '{{%work_shifts}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-work_shifts-user_id}}',
            '{{%work_shifts}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221018_065615_update_work_shifts_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221018_065615_update_work_shifts_table cannot be reverted.\n";

        return false;
    }
    */
}
