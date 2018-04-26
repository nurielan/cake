<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_category`.
 */
class m180220_034545_create_blog_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog_category', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'no' => $this->string(64)->unique(),
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
        $this->dropTable('blog_category');
    }
}
