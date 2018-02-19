<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_config`.
 */
class m180219_072047_create_user_config_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_config', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'user_id' => 'INT UNSIGNED',
            'user_address_id' => 'INT UNSIGNED DEFAULT NULL',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-user_config-user_id', 'user_config', 'user_Id', true);
        $this->createIndex('i-user_config-user_address_id', 'user_config', 'user_address_id', true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_config');
    }
}
