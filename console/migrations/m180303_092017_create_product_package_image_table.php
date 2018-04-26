<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_package_image`.
 */
class m180303_092017_create_product_package_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_package_image', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'product_package_no' => $this->string(64),
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

        $this->createIndex('i-product_package_image-product_package_no', 'product_package_image', 'product_package_no', false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_package_image');
    }
}
