<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_category`.
 */
class m180219_073435_create_product_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_category', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'product_brand_id' => 'INT UNSIGNED',
            'name' => $this->string(64)->notNull(),
            'alias' => $this->string(64),
            'image1' => $this->string(64),
            'image2' => $this->string(64),
            'image3' => $this->string(64),
            'status' => 'TINYINT(1) DEFAULT 0',
            'discount' => $this->smallInteger(3)->defaultValue(0),
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
        $this->dropTable('product_category');
    }
}
