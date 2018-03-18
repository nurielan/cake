<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cake_product_item_highlight`.
 */
class m180317_022226_create_cake_product_item_highlight_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cake_product_item_highlight', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'product_item_no' => $this->string(64)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-cpih-product_item_no', 'cake_product_item_highlight', 'product_item_no', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cake_product_item_highlight');
    }
}
