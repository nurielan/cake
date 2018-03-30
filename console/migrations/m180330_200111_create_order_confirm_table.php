<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_confirm`.
 */
class m180330_200111_create_order_confirm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_confirm', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'via' => $this->string(),
            'amount' => $this->integer(),
            'bank' => $this->string(),
            'account_number' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order_confirm');
    }
}
