<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pp_order_confirm`.
 */
class m180501_050814_create_pp_order_confirm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pp_order_confirm', [
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
        $this->dropTable('pp_order_confirm');
    }
}
