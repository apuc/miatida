<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prices}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%services}}`
 * - `{{%tarifes}}`
 * - `{{%body_types}}`
 */
class m220927_211129_create_prices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prices}}', [
            'id' => $this->primaryKey(),
            'services_id' => $this->integer(11)->notNull(),
            'tarif_id' => $this->integer(11)->notNull(),
            'body_type_id' => $this->integer(11)->notNull(),
            'price' => $this->integer(11),
        ]);

        $this->createIndex(
            '{{%idx-prices-services_id}}',
            '{{%prices}}',
            'services_id'
        );

        $this->addForeignKey(
            '{{%fk-prices-services_id}}',
            '{{%prices}}',
            'services_id',
            '{{%services}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            '{{%idx-prices-tarif_id}}',
            '{{%prices}}',
            'tarif_id'
        );

        $this->addForeignKey(
            '{{%fk-prices-tarif_id}}',
            '{{%prices}}',
            'tarif_id',
            '{{%tarifes}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            '{{%idx-prices-body_type_id}}',
            '{{%prices}}',
            'body_type_id'
        );

        $this->addForeignKey(
            '{{%fk-prices-body_type_id}}',
            '{{%prices}}',
            'body_type_id',
            '{{%body_types}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-prices-services_id}}',
            '{{%prices}}'
        );

        $this->dropIndex(
            '{{%idx-prices-services_id}}',
            '{{%prices}}'
        );

        $this->dropForeignKey(
            '{{%fk-prices-tarif_id}}',
            '{{%prices}}'
        );

        $this->dropIndex(
            '{{%idx-prices-tarif_id}}',
            '{{%prices}}'
        );

        $this->dropForeignKey(
            '{{%fk-prices-body_type_id}}',
            '{{%prices}}'
        );

        $this->dropIndex(
            '{{%idx-prices-body_type_id}}',
            '{{%prices}}'
        );

        $this->dropTable('{{%prices}}');
    }
}
