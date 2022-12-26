<?php

namespace common\models;

use backend\models\Iva;
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
 * @property int $iva_id
 * @property int $categoria_id
 *
 * @property LinhaPedido[] $linhaPedidos
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
            [['nome', 'descricao', 'referencia', 'quantidade', 'preco', 'data', 'estado', 'iva_id', 'categoria_id'],
                'required','message'=>'Os campos selecionados são de preenchimento obrigatório'],
            [['quantidade', 'estado', 'iva_id', 'categoria_id'], 'integer'],
            [['preco'], 'number'],
            [['data'], 'safe'],
            [['nome'], 'string', 'max' => 200,'message'=>'O campo nome tem um máximo de 200 carateres'],
            [['descricao',], 'string', 'max' => 255,'message'=>'O campo nome tem um máximo de 200 carateres'],
            [['imagem','imagemurl',],'string'],
            [['imagem'],'file','extensions'=>'jpg, jpeg, png','skipOnEmpty' => true],
            [['referencia'], 'string', 'max' => 45,'message'=>'O campo nome tem um máximo de 45 carateres'],
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
            'imagemurl'=>'Imagem Url',
            'estado' => 'Estado',
            'iva_id' => 'Taxa de Iva',
            'categoria_id' => 'Categoria ',
        ];
    }

    /**
     * Gets query for [[LinhaPedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaPedidos()
    {
        return $this->hasMany(LinhaPedido::class, ['artigo_id' => 'id']);
    }

    public function getIva()
    {
        return $this->hasOne(Iva::class, ['id' => 'iva_id']);
    }

    public function getCategoria()
    {
        return $this->hasOne(Categoria::class, ['id' => 'categoria_id']);
    }
}
