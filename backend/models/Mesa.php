<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mesa".
 *
 * @property int $id
 * @property int $nrmesa
 * @property int $nrlugares
 * @property string $tipomesa
 *
 * @property Pedido[] $pedidos
 */
class Mesa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mesa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nrmesa', 'nrlugares', 'tipomesa'], 'required','message'=>'Os campos selecionados são de preenchimento obrigatório'],
            [['nrmesa', 'nrlugares'], 'integer'],
            [['tipomesa'], 'string', 'max' => 100,'message'=>'O campo tipo de mesa tem um máximo de 100 caracteres'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nrmesa' => 'Nrmesa',
            'nrlugares' => 'Nrlugares',
            'tipomesa' => 'Tipomesa',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['mesa_id' => 'id']);
    }
}
