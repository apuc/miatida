<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%salary}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m221018_110410_create_salary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%salary}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'salary' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-salary-user_id}}',
            '{{%salary}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-salary-user_id}}',
            '{{%salary}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-salary-user_id}}',
            '{{%salary}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-salary-user_id}}',
            '{{%salary}}'
        );

        $this->dropTable('{{%salary}}');
    }
}
