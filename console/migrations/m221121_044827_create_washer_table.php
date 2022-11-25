<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%washer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m221121_044827_create_washer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%washer}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'image' => $this->text(),
            'phone' => $this->string(),
            'add_phone' => $this->string(),
            'add_phone_owner'  => $this->string(),
            'salary_exit'  => $this->integer(),
            'date_birth' => $this->string(),
            'salary_percent' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-washer-user_id}}',
            '{{%washer}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-washer-user_id}}',
            '{{%washer}}',
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
            '{{%fk-washer-user_id}}',
            '{{%washer}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-washer-user_id}}',
            '{{%washer}}'
        );

        $this->dropTable('{{%washer}}');
    }
}
