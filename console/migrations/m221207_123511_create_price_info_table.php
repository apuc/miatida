<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price_info}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 * - `{{%prices}}`
 */
class m221207_123511_create_price_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%price_info}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'price_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-price_info-order_id}}',
            '{{%price_info}}',
            'order_id'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-price_info-order_id}}',
            '{{%price_info}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );

        // creates index for column `price_id`
        $this->createIndex(
            '{{%idx-price_info-price_id}}',
            '{{%price_info}}',
            'price_id'
        );

        // add foreign key for table `{{%prices}}`
        $this->addForeignKey(
            '{{%fk-price_info-price_id}}',
            '{{%price_info}}',
            'price_id',
            '{{%prices}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%orders}}`
        $this->dropForeignKey(
            '{{%fk-price_info-order_id}}',
            '{{%price_info}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-price_info-order_id}}',
            '{{%price_info}}'
        );

        // drops foreign key for table `{{%prices}}`
        $this->dropForeignKey(
            '{{%fk-price_info-price_id}}',
            '{{%price_info}}'
        );

        // drops index for column `price_id`
        $this->dropIndex(
            '{{%idx-price_info-price_id}}',
            '{{%price_info}}'
        );

        $this->dropTable('{{%price_info}}');
    }
}
