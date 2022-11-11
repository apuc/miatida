<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_salary}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m221106_221738_create_payment_salary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment_salary}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'date' => $this->integer(),
            'payment' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-payment_salary-user_id}}',
            '{{%payment_salary}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-payment_salary-user_id}}',
            '{{%payment_salary}}',
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
            '{{%fk-payment_salary-user_id}}',
            '{{%payment_salary}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-payment_salary-user_id}}',
            '{{%payment_salary}}'
        );

        $this->dropTable('{{%payment_salary}}');
    }
}
