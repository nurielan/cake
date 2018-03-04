<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_item_image`.
 */
class m180303_091227_create_product_item_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_item_image', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'product_item_no' => $this->string(64),
            'name' => $this->string(64)->notNull(),
            'alias' => $this->string(64),
            'image1' => $this->string(64),
            'image2' => $this->string(64),
            'image3' => $this->string(64),
            'description' => $this->text(),
            'status' => 'TINYINT(1) DEFAULT 0',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-product_item_image-product_item_no', 'product_item_image', 'product_item_no', false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_item_image');
    }
}
