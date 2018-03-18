<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cake_what_we_can`.
 */
class m180317_022342_create_cake_what_we_can_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cake_what_we_can', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'name' => $this->string(64)->notNull(),
            'alias' => $this->string(64),
            'image1' => $this->string(64),
            'description' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cake_what_we_can');
    }
}
