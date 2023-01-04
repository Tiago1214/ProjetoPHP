<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%metodopagamento}}`.
 */
class m230104_215347_create_metodopagamento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%metodopagamento}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%metodopagamento}}');
    }
}
