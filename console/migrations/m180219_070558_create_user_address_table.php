<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_address`.
 */
class m180219_070558_create_user_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_address', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'user_id' => 'INT UNSIGNED',
            'title' => $this->string(64)->notNull(),
            'name' => $this->string(64)->notNull(),
            'address' => $this->text()->notNull(),
            'subdistrict' => $this->string(64)->notNull(),
            'district' => $this->string(64)->notNull(),
            'province' => $this->string(64)->notNull(),
            'postal_code' => $this->string(24)->notNull(),
            'phone_number' => $this->string(24)->notNull()->unique(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-user_address-user_id', 'user_address', 'user_id', false);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_address');
    }
}
