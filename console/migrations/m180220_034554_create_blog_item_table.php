<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_item`.
 */
class m180220_034554_create_blog_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog_item', [
            'id' => 'INT UNSIGNED PRIMARY KEY AUTO_INCREMENT',
            'no' => $this->string(64)->unique(),
            'blog_category_no' => $this->string(64),
            'blog_tag_no' => $this->string(64),
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

        $this->createIndex('i-blog_item-blog_category_no', 'blog_item', 'blog_category_no', false);
        $this->createIndex('i-blog_item-blog_tag_no', 'blog_item', 'blog_tag_no', false);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog_item');
    }
}
