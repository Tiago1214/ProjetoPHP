<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reserva}}`.
 */
class m230104_215541_create_reserva_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reserva}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reserva}}');
    }
}
