<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_brand`.
 */
class m180219_073422_create_product_brand_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_brand', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
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
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_brand');
    }
}
