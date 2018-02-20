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
            'user_no' => $this->string(64),
            'primary_address' => $this->string(64),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-user_config-user_no', 'user_config', 'user_no', true);
        $this->createIndex('i-user_config-primary_address', 'user_config', 'primary_address', true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_config');
    }
}
