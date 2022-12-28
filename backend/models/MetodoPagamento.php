<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "metodo_pagamento".
 *
 * @property int $id
 * @property string $nomepagamento
 * @property int $estado
 *
 * @property Pedido[] $pedidos
 */
class MetodoPagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metodo_pagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomepagamento', 'estado'], 'required','message'=>'Os campos selecionados são de preenchimento obrigatório'],
            [['estado'], 'integer'],
            [['nomepagamento'], 'string', 'max' => 255,'O campo nome de pagamento tem um máximo de 255 carateres'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomepagamento' => 'Nomepagamento',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['metodo_pagamento_id' => 'id']);
    }
}
