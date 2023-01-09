<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property int $estado
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'estado'], 'required','message'=>'Os campos selecionados são de preenchimento obrigatório'],
            [['estado'], 'integer'],
            [['nome'],'unique','message'=>'Categoria já existente'],
            [['nome'], 'string', 'max' => 200,'message'=>'O campo nome tem um máximo de 200 carateres'],
            [['descricao'], 'string', 'max' => 255,'message'=>'O campo descricao tem um máximo de 255 carateres'],
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
            'estado' => 'Estado',
        ];
    }

    public function getArtigo()
    {
        return $this->hasMany(Artigo::class, ['id' => 'artigo_id']);
    }
}
