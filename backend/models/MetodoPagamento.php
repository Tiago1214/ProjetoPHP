<?php

namespace backend\models;

use common\models\Pedido;
use Yii;

/**
 * This is the model class for table "metodopagamento".
 *
 * @property int $id
 * @property string $nomepagamento
 * @property int $estado
 *
 * @property Pedido[] $pedidos
 */
class Metodopagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metodopagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomepagamento', 'estado'], 'required'],
            [['estado'], 'integer'],
            [['nomepagamento'], 'string', 'max' => 255],
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
