<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pp_order_item`.
 */
class m180425_091732_create_pp_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pp_order_item', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'pp_order_list_no' => $this->string(64),
            'product_package_no' => $this->string(64),
            'product_package_name' => $this->string(64),
            'product_package_alias' => $this->string(64),
            'product_package_image1' => $this->string(64),
            'product_package_image2' => $this->string(64),
            'product_package_image3' => $this->string(64),
            'product_package_discount' => $this->smallInteger(3)->defaultValue(0),
            'product_package_discount_price' => $this->money(18, 2)->defaultValue(0),
            'product_package_tax' => $this->smallInteger(3)->defaultValue(0),
            'product_package_tax_price' => $this->money(18, 2)->defaultValue(0),
            'product_package_type' => 'TINYINT(1) DEFAULT 1',
            'product_package_description' => $this->text(),
            'product_package_price' => $this->money(18, 2),
            'product_package_weight' => $this->integer()->defaultValue(0),
            'product_package_pi_1' => $this->string(64),
            'product_package_pi_2' => $this->string(64),
            'product_package_pi_3' => $this->string(64),
            'product_package_pi_4' => $this->string(64),
            'product_package_pi_5' => $this->string(64),
            'product_package_pi_6' => $this->string(64),
            'product_package_pi_7' => $this->string(64),
            'product_package_pi_8' => $this->string(64),
            'product_package_pi_9' => $this->string(64),
            'product_package_pi_10' => $this->string(64),
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

        $this->createIndex('i-pp_order_item-pp_order_list_no', 'pp_order_item', 'pp_order_list_no', false);
        $this->createIndex('i-pp_order_item-product_package_no', 'pp_order_item', 'product_package_no', false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pp_order_item');
    }
}
