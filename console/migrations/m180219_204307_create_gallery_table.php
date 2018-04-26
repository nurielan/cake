<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery`.
 */
class m180219_204307_create_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('gallery', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
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
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('gallery');
    }
}
