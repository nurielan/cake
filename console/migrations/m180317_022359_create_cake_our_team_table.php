<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cake_our_team`.
 */
class m180317_022359_create_cake_our_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cake_our_team', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'fullname' => $this->string(64)->notNull(),
            'username' => $this->string(64),
            'gender' => 'TINYINT(1) DEFAULT 0',
            'description' => $this->text(),
            'image1' => $this->string(64),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cake_our_team');
    }
}
