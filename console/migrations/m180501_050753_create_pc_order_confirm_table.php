<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pc_order_confirm`.
 */
class m180501_050753_create_pc_order_confirm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pc_order_confirm', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'via' => $this->string()->notNull(),
            'amount' => $this->integer()->defaultValue(0),
            'bank' => $this->string()->notNull(),
            'bank_id' => 'INT UNSIGNED',
            'account_name' => $this->string()->notNull(),
            'account_number' => $this->string(),
            'status' => 'TINYINT(1) DEFAULT 0',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pc_order_confirm');
    }
}
