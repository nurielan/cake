<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cache`.
 */
class m180219_043351_create_cache_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cache', [
            'id' => 'CHAR(128) NOT NULL PRIMARY KEY',
            'expire' => 'INT(11)',
            'data' => 'LONGBLOB'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cache');
    }
}
