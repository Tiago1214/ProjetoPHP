<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%artigo}}`.
 */
class m230104_213535_create_artigo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%artigo}}', [
            'id' => $this->primaryKey(),
            ''
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%artigo}}');
    }
}
