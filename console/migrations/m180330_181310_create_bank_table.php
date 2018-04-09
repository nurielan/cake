<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bank`.
 */
class m180330_181310_create_bank_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bank', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'name' => $this->string(),
            'account_number' => $this->string()->unique(),
            'account_name' => $this->string(),
            'branch' => $this->string(),
            'image' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bank');
    }
}
