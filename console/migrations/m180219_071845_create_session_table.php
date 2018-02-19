<?php

use yii\db\Migration;

/**
 * Handles the creation of table `session`.
 */
class m180219_071845_create_session_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('session', [
            'id' => 'CHAR(40) NOT NULL PRIMARY KEY',
            'expire' => $this->integer(),
            'data' => 'LONGBLOB'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('session');
    }
}
