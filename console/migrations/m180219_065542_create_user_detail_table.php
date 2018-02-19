<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_detail`.
 */
class m180219_065542_create_user_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_detail', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'user_id' => 'INT UNSIGNED',
            'fullname' => $this->string(64)->notNull(),
            'gender' => 'TINYINT(1) DEFAULT 0',
            'description' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex('i-user_detail-user_id', 'user_detail', 'user_id', true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_detail');
    }
}
