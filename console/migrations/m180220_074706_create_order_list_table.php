<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_list`.
 */
class m180220_074706_create_order_list_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_list', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'no' => $this->string(64)->notNull()->unique(),
            'cashier' => 'INT UNSIGNED',
            'quantity' => $this->integer()->defaultValue(0),
            'discount' => $this->smallInteger(3)->defaultValue(0),
            'discount_price' => $this->money(18, 2),
            'tax' => $this->smallInteger(3)->defaultValue(0),
            'tax_price' => $this->money(18, 2),
            'weight' => $this->integer(),
            'price' => $this->money(18, 2),
            'user_no' => $this->string(64),
            'user_username' => $this->string(64)->notNull()->unique(),
            'user_email' => $this->string(64)->notNull()->unique(),
            'user_image' => $this->string(64),
            'user_role' => 'TINYINT(1) DEFAULT 0',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-order_list-cashier', 'order_list', 'cashier', false);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_list');
    }
}
