<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pedido}}`.
 */
class m230104_215457_create_pedido_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pedido}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pedido}}');
    }
}
