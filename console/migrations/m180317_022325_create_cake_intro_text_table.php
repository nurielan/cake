<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cake_intro_text`.
 */
class m180317_022325_create_cake_intro_text_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cake_intro_text', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'description' => $this->text()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cake_intro_text');
    }
}
