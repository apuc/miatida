<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%clients}}`
 * - `{{%prices}}`
 * - `{{%cars}}`
 * - `{{%work_shifts}}`
 */
class m220929_092913_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'client_id' => $this->integer(),
            'price_id' => $this->integer(),
            'car_id' => $this->integer(),
            'work_shift_id' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-orders-user_id}}',
            '{{%orders}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-user_id}}',
            '{{%orders}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `client_id`
        $this->createIndex(
            '{{%idx-orders-client_id}}',
            '{{%orders}}',
            'client_id'
        );

        // add foreign key for table `{{%clients}}`
        $this->addForeignKey(
            '{{%fk-orders-client_id}}',
            '{{%orders}}',
            'client_id',
            '{{%clients}}',
            'id',
            'CASCADE'
        );

        // creates index for column `price_id`
        $this->createIndex(
            '{{%idx-orders-price_id}}',
            '{{%orders}}',
            'price_id'
        );

        // add foreign key for table `{{%prices}}`
        $this->addForeignKey(
            '{{%fk-orders-price_id}}',
            '{{%orders}}',
            'price_id',
            '{{%prices}}',
            'id',
            'CASCADE'
        );

        // creates index for column `car_id`
        $this->createIndex(
            '{{%idx-orders-car_id}}',
            '{{%orders}}',
            'car_id'
        );

        // add foreign key for table `{{%cars}}`
        $this->addForeignKey(
            '{{%fk-orders-car_id}}',
            '{{%orders}}',
            'car_id',
            '{{%cars}}',
            'id',
            'CASCADE'
        );

        // creates index for column `work_shift_id`
        $this->createIndex(
            '{{%idx-orders-work_shift_id}}',
            '{{%orders}}',
            'work_shift_id'
        );

        // add foreign key for table `{{%work_shifts}}`
        $this->addForeignKey(
            '{{%fk-orders-work_shift_id}}',
            '{{%orders}}',
            'work_shift_id',
            '{{%work_shifts}}',
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
            '{{%fk-orders-user_id}}',
            '{{%orders}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-orders-user_id}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%clients}}`
        $this->dropForeignKey(
            '{{%fk-orders-client_id}}',
            '{{%orders}}'
        );

        // drops index for column `client_id`
        $this->dropIndex(
            '{{%idx-orders-client_id}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%prices}}`
        $this->dropForeignKey(
            '{{%fk-orders-price_id}}',
            '{{%orders}}'
        );

        // drops index for column `price_id`
        $this->dropIndex(
            '{{%idx-orders-price_id}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%cars}}`
        $this->dropForeignKey(
            '{{%fk-orders-car_id}}',
            '{{%orders}}'
        );

        // drops index for column `car_id`
        $this->dropIndex(
            '{{%idx-orders-car_id}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%work_shifts}}`
        $this->dropForeignKey(
            '{{%fk-orders-work_shift_id}}',
            '{{%orders}}'
        );

        // drops index for column `work_shift_id`
        $this->dropIndex(
            '{{%idx-orders-work_shift_id}}',
            '{{%orders}}'
        );

        $this->dropTable('{{%orders}}');
    }
}
