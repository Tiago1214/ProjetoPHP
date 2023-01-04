<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comentario}}`.
 */
class m230104_215028_create_comentario_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comentario}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comentario}}');
    }
}
