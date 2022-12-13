<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "iva".
 *
 * @property int $id
 * @property string $descricao
 * @property int $taxaiva
 * @property int $estado
 */
class Iva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'iva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'taxaiva', 'estado'], 'required'],
            [['taxaiva', 'estado'], 'integer'],
            [['descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'taxaiva' => 'Taxaiva',
            'estado' => 'Estado',
        ];
    }

    public function getArtigo()
    {
        return $this->hasMany(Artigo::class, ['id' => 'artigo_id']);
    }
}
