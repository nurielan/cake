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
            'via' => $this->string()->notNull(),
            'amount' => $this->integer()->defaultValue(0),
            'bank' => $this->string()->notNull(),
            'account_name' => $this->string()->notNull(),
            'account_number' => $this->string()->notNull(),
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
        $this->dropTable('order_confirm');
    }
}
