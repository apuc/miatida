<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clients}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220928_141719_create_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'name' => $this->string(255),
            'phone' => $this->string(255),
            'additional_info' => $this->text(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-clients-user_id}}',
            '{{%clients}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-clients-user_id}}',
            '{{%clients}}',
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
            '{{%fk-clients-user_id}}',
            '{{%clients}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-clients-user_id}}',
            '{{%clients}}'
        );

        $this->dropTable('{{%clients}}');
    }
}
