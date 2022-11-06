<?php

use yii\db\Migration;

/**
 * Class m221106_235242_update_settings_table
 */
class m221106_235242_update_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('settings',array(
            'key'=>'salaryWasher',
            'value' =>'30',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

}
