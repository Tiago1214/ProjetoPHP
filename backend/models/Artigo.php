<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "artigo".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property string $referencia
 * @property int $quantidade
 * @property float $preco
 * @property string $data
 * @property string|null $imagem
 * @property int $estado
 * @property int $linha_pedido_id
 * @property int $categorias_id
 * @property int $iva_id
 */
class Artigo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artigo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'referencia', 'quantidade', 'preco', 'data', 'estado', 'linha_pedido_id', 'categorias_id', 'iva_id'], 'required'],
            [['quantidade', 'estado', 'linha_pedido_id', 'categorias_id', 'iva_id'], 'integer'],
            [['preco'], 'number'],
            [['data'], 'safe'],
            [['nome'], 'string', 'max' => 200],
            [['descricao', 'imagem'], 'string', 'max' => 255],
            [['referencia'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'referencia' => 'Referencia',
            'quantidade' => 'Quantidade',
            'preco' => 'Preco',
            'data' => 'Data',
            'imagem' => 'Imagem',
            'estado' => 'Estado',
            'linha_pedido_id' => 'Linha Pedido ID',
            'categorias_id' => 'Categorias ID',
            'iva_id' => 'Iva ID',
        ];
    }
}
