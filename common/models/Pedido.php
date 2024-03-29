<?php

namespace common\models;

use backend\models\Metodopagamento;
use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property string $data
 * @property float $total
 * @property int $tipo_pedido
 * @property int $estado
 * @property int $profile_id
 * @property int $metodo_pagamento_id
 * @property int $mesa_id
 *
 * @property LinhaPedido[] $linhaPedidos
 * @property Mesa $mesa
 * @property MetodoPagamento $metodoPagamento
 * @property Profile $profile
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['data', 'total', 'tipo_pedido', 'estado', 'profile_id'],
                'required','message'=>'Os campos selecionados são de preenchimento obrigatório'],
            [['data'], 'safe'],
            [['total'], 'number'],
            [['estado'],'string','max'=>45,'message'=>'O campo estado tem um máximo de 45 carateres'],
            [['tipo_pedido', 'profile_id', 'metodo_pagamento_id', 'mesa_id'], 'integer'],
            [['mesa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::class, 'targetAttribute' => ['mesa_id' => 'id']],
            [['metodo_pagamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => MetodoPagamento::class, 'targetAttribute' => ['metodo_pagamento_id' => 'id']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Número de Pedido',
            'data' => 'Data',
            'total' => 'Total',
            'tipo_pedido' => 'Tipo Pedido',
            'estado'=>'Estado',
            'profile_id' => 'Utilizador',
            'metodo_pagamento_id' => 'Método Pagamento ',
            'mesa_id' => 'Mesa ',
        ];
    }

    /**
     * Gets query for [[LinhaPedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaPedidos()
    {
        return $this->hasMany(LinhaPedido::class, ['pedido_id' => 'id']);
    }

    /**
     * Gets query for [[Mesa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMesa()
    {
        return $this->hasOne(Mesa::class, ['id' => 'mesa_id']);
    }

    /**
     * Gets query for [[MetodoPagamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMetodoPagamento()
    {
        return $this->hasOne(Metodopagamento::class, ['id' => 'metodo_pagamento_id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['id' => 'profile_id']);
    }
}
