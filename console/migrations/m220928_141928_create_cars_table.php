<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%body_types}}`
 * - `{{%car_photos}}`
 * - `{{%clients}}`
 */
class m220928_141928_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'body_type_id' => $this->integer(11),
            'photo_id' => $this->integer(11)->notNull(),
            'client_id' => $this->integer(11)->notNull(),
            'status' => $this->integer(1)->defaultValue(1),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

        // creates index for column `body_type_id`
        $this->createIndex(
            '{{%idx-cars-body_type_id}}',
            '{{%cars}}',
            'body_type_id'
        );

        // add foreign key for table `{{%body_types}}`
        $this->addForeignKey(
            '{{%fk-cars-body_type_id}}',
            '{{%cars}}',
            'body_type_id',
            '{{%body_types}}',
            'id',
            'CASCADE'
        );

        // creates index for column `photo_id`
        $this->createIndex(
            '{{%idx-cars-photo_id}}',
            '{{%cars}}',
            'photo_id'
        );

        // add foreign key for table `{{%car_photos}}`
        $this->addForeignKey(
            '{{%fk-cars-photo_id}}',
            '{{%cars}}',
            'photo_id',
            '{{%car_photos}}',
            'id',
            'CASCADE'
        );

        // creates index for column `client_id`
        $this->createIndex(
            '{{%idx-cars-client_id}}',
            '{{%cars}}',
            'client_id'
        );

        // add foreign key for table `{{%clients}}`
        $this->addForeignKey(
            '{{%fk-cars-client_id}}',
            '{{%cars}}',
            'client_id',
            '{{%clients}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%body_types}}`
        $this->dropForeignKey(
            '{{%fk-cars-body_type_id}}',
            '{{%cars}}'
        );

        // drops index for column `body_type_id`
        $this->dropIndex(
            '{{%idx-cars-body_type_id}}',
            '{{%cars}}'
        );

        // drops foreign key for table `{{%car_photos}}`
        $this->dropForeignKey(
            '{{%fk-cars-photo_id}}',
            '{{%cars}}'
        );

        // drops index for column `photo_id`
        $this->dropIndex(
            '{{%idx-cars-photo_id}}',
            '{{%cars}}'
        );

        // drops foreign key for table `{{%clients}}`
        $this->dropForeignKey(
            '{{%fk-cars-client_id}}',
            '{{%cars}}'
        );

        // drops index for column `client_id`
        $this->dropIndex(
            '{{%idx-cars-client_id}}',
            '{{%cars}}'
        );

        $this->dropTable('{{%cars}}');
    }
}
