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
            'no' => $this->string(64)->unique(),
            'user_no' => $this->string(64),
            'title' => $this->string(64)->notNull(),
            'name' => $this->string(64)->notNull(),
            'address' => $this->text()->notNull(),
            'subdistrict' => $this->string(64)->notNull(),
            'subdistrict_no' => $this->string(24),
            'district' => $this->string(64)->notNull(),
            'district_no' => $this->string(24),
            'province' => $this->string(64)->notNull(),
            'province_no' => $this->string(24),
            'postal_code' => $this->string(24)->notNull(),
            'phone_number' => $this->string(24)->notNull()->unique(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-user_address-user_no', 'user_address', 'user_no', false);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_address');
    }
}
