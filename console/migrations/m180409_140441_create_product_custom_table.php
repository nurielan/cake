<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_custom`.
 */
class m180409_140441_create_product_custom_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_custom', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'user_no' => $this->string(64)->notNull(),
            'no' => $this->string(64)->unique(),
            'name' => $this->string(64)->notNull(),
            'alias' => $this->string(64),
            'image1' => $this->string(64),
            'image2' => $this->string(64),
            'image3' => $this->string(64),
            'description' => $this->text(),
            'status' => 'TINYINT(1) DEFAULT 0',
            'discount' => $this->smallInteger(3)->defaultValue(0),
            'discount_price' => $this->money(18, 2)->defaultValue(0),
            'tax' => $this->smallInteger(3)->defaultValue(0),
            'tax_price' => $this->money(18, 2)->defaultValue(0),
            'type' => 'TINYINT(1) DEFAULT 1',
            //'in_stock' => $this->integer()->defaultValue(0),
            //'out_stock' => $this->integer()->defaultValue(0),
            'price' => $this->money(18, 2),
            'weight' => $this->integer()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_custom');
    }
}
