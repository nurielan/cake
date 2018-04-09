<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_item`.
 */
class m180220_074714_create_order_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_item', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'order_list_no' => $this->string(64),
            'product_item_no' => $this->string(64),
            'product_item_name' => $this->string(64),
            'product_item_alias' => $this->string(64),
            'product_item_image1' => $this->string(64),
            'product_item_image2' => $this->string(64),
            'product_item_image3' => $this->string(64),
            'product_item_discount' => $this->smallInteger(3)->defaultValue(0),
            'product_item_discount_price' => $this->money(18, 2)->defaultValue(0),
            'product_item_tax' => $this->smallInteger(3)->defaultValue(0),
            'product_item_tax_price' => $this->money(18, 2)->defaultValue(0),
            'product_item_type' => 'TINYINT(1) DEFAULT 1',
            'product_item_description' => $this->text(),
            'product_item_price' => $this->money(18, 2),
            'product_item_weight' => $this->integer()->defaultValue(0),
            'quantity' => $this->integer()->defaultValue(0),
            'sub_discount' => $this->smallInteger(3)->defaultValue(0),
            'sub_discount_price' => $this->money(18, 2),
            'sub_tax' => $this->smallInteger(3)->defaultValue(0),
            'sub_tax_price' => $this->money(18, 2),
            'sub_weight' => $this->integer(),
            'sub_price' => $this->money(18, 2),
            'user_address_title' => $this->string(64)->notNull(),
            'user_address_name' => $this->string(64)->notNull(),
            'user_address_address' => $this->text()->notNull(),
            'user_address_subdistrict' => $this->string(64)->notNull(),
            'user_address_subdistrict_no' => $this->string(24),
            'user_address_district' => $this->string(64)->notNull(),
            'user_address_district_no' => $this->string(24),
            'user_address_province' => $this->string(64)->notNull(),
            'user_address_province_no' => $this->string(24),
            'user_address_postal_code' => $this->string(24)->notNull(),
            'user_address_phone_number' => $this->string(24)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-order_item-order_list_no', 'order_item', 'order_list_no', false);
        $this->createIndex('i-order_item-product_item_no', 'order_item', 'product_item_no', false);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_item');
    }
}
