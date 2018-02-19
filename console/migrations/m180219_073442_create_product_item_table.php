<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_item`.
 */
class m180219_073442_create_product_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_item', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'product_category_id' => 'INT UNSIGNED',
            'name' => $this->string(64)->notNull(),
            'alias' => $this->string(64),
            'image1' => $this->string(64),
            'image2' => $this->string(64),
            'image3' => $this->string(64),
            'status' => 'TINYINT(1) DEFAULT 0',
            'discount' => $this->smallInteger(3)->defaultValue(0),
            'type' => 'TINYINT(1) DEFAULT 1',
            'in_stock' => $this->integer()->defaultValue(0),
            'out_stock' => $this->integer()->defaultValue(0),
            'price' => $this->money(18, 2),

            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-product_category-product_brand_id', 'product_category', 'product_brand_id', false);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_item');
    }
}
