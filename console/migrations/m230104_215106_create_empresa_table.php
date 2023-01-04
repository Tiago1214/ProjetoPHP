<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%empresa}}`.
 */
class m230104_215106_create_empresa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%empresa}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%empresa}}');
    }
}
