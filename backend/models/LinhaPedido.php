<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "linha_pedido".
 *
 * @property int $id
 * @property string $data
 * @property string $preco
 * @property string $iva
 * @property int $pedido_id
 *
 * @property Pedido $pedido
 */
class LinhaPedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linha_pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'preco', 'iva', 'pedido_id'], 'required'],
            [['data'], 'safe'],
            [['pedido_id'], 'integer'],
            [['preco', 'iva'], 'string', 'max' => 45],
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
            'data' => 'Data',
            'preco' => 'Preco',
            'iva' => 'Iva',
            'pedido_id' => 'Pedido ID',
        ];
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
