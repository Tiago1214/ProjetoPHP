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
            'nome'=>$this->string()->notNull(),
            'descricao'=>$this->string()->notNull(),
            'referencia'=>$this->string()->notNull(),
            'quantidade'=>$this->integer()->notNull(),
            'preco'=>$this->float()->notNull(),
            'data'=>$this->dateTime()->notNull(),
            'imagem'=>$this->text()->null(),
            'imagemurl'=>$this->text()->null(),
            'estado'=>$this->integer()->null(),
            $this->addForeignKey('fk-artigoIva','artigo','iva_id','iva','id'),
            $this->addForeignKey('fk-artigoCategoria','artigo','categoria_id','categoria','id'),
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
