<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mesa}}`.
 */
class m230104_215248_create_mesa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mesa}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mesa}}');
    }
}
