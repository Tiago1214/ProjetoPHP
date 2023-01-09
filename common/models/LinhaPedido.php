<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhapedido".
 *
 * @property int $id
 * @property int $quantidade
 * @property float $valorunitario
 * @property float $valoriva
 * @property int $taxaiva
 * @property int $pedido_id
 * @property int $artigo_id
 *
 * @property Artigo $artigo
 * @property Pedido $pedido
 */
class Linhapedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linhapedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantidade', 'valorunitario', 'valoriva', 'taxaiva', 'pedido_id', 'artigo_id'], 'required'],
            [['quantidade', 'taxaiva', 'pedido_id', 'artigo_id'], 'integer'],
            [['valorunitario', 'valoriva'], 'number'],
            [['artigo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artigo::class, 'targetAttribute' => ['artigo_id' => 'id']],
            [['pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::class, 'targetAttribute' => ['pedido_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantidade' => 'Quantidade',
            'valorunitario' => 'Valorunitario',
            'valoriva' => 'Valoriva',
            'taxaiva' => 'Taxaiva',
            'pedido_id' => 'Pedido ',
            'artigo_id' => 'Artigo',
        ];
    }

    /**
     * Gets query for [[Artigo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtigo()
    {
        return $this->hasOne(Artigo::class, ['id' => 'artigo_id']);
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::class, ['id' => 'pedido_id']);
    }
}
