<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%iva}}`.
 */
class m230104_215125_create_iva_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%iva}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%iva}}');
    }
}
