<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pc_order_list`.
 */
class m180409_140503_create_pc_order_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pc_order_list', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'no' => $this->string(64)->notNull()->unique(),
            'cashier' => $this->string(64),
            'quantity' => $this->integer()->defaultValue(0),
            'discount' => $this->smallInteger(3)->defaultValue(0),
            'discount_price' => $this->money(18, 2),
            'tax' => $this->smallInteger(3)->defaultValue(0),
            'tax_price' => $this->money(18, 2),
            'weight' => $this->integer(),
            'price' => $this->money(18, 2),
            'user_no' => $this->string(64),
            'user_username' => $this->string(64)->notNull(),
            'user_email' => $this->string(64)->notNull(),
            'user_image' => $this->string(64),
            'user_role' => 'TINYINT(1) DEFAULT 0',
            'transfer_confirmation' => 'INT UNSIGNED',
            'status' => 'TINYINT(1) DEFAULT 0',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-pc_order_list-transfer_confirmation', 'pc_order_list', 'transfer_confirmation', false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pc_order_list');
    }
}
