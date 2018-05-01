<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_package`.
 */
class m180219_203710_create_product_package_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_package', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'no' => $this->string(64),
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
            'in_stock' => $this->integer()->defaultValue(0),
            'out_stock' => $this->integer()->defaultValue(0),
            'price' => $this->money(18, 2)->defaultValue(0),
            'weight' => $this->integer()->defaultValue(0),
            'product_item_1' => $this->string(64),
            'product_item_2' => $this->string(64),
            'product_item_3' => $this->string(64),
            'product_item_4' => $this->string(64),
            'product_item_5' => $this->string(64),
            'product_item_6' => $this->string(64),
            'product_item_7' => $this->string(64),
            'product_item_8' => $this->string(64),
            'product_item_9' => $this->string(64),
            'product_item_10' => $this->string(64),
            'custom' => 'TINYINT(1) DEFAULT 0',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-product_package-product_item_1', 'product_package', 'product_item_1', false);
        $this->createIndex('i-product_package-product_item_2', 'product_package', 'product_item_2', false);
        $this->createIndex('i-product_package-product_item_3', 'product_package', 'product_item_3', false);
        $this->createIndex('i-product_package-product_item_4', 'product_package', 'product_item_4', false);
        $this->createIndex('i-product_package-product_item_5', 'product_package', 'product_item_5', false);
        $this->createIndex('i-product_package-product_item_6', 'product_package', 'product_item_6', false);
        $this->createIndex('i-product_package-product_item_7', 'product_package', 'product_item_7', false);
        $this->createIndex('i-product_package-product_item_8', 'product_package', 'product_item_8', false);
        $this->createIndex('i-product_package-product_item_9', 'product_package', 'product_item_9', false);
        $this->createIndex('i-product_package-product_item_10', 'product_package', 'product_item_10', false);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_package');
    }
}
