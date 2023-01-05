<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%linhapedido}}`.
 */
class m230104_215236_create_linhapedido_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%linhapedido}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%linhapedido}}');
    }
}
