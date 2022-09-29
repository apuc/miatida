<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_photos}}`.
 */
class m220928_114645_create_car_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_photos}}', [
            'id' => $this->primaryKey(),
            'path' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_photos}}');
    }
}
