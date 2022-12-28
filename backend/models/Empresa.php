<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property string $nomeempresa
 * @property string $email
 * @property string $telefone
 * @property string $nif
 * @property string $morada
 * @property string $codpostal
 * @property string|null $localidade
 * @property int $capitalsocial
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomeempresa', 'email', 'telefone', 'nif', 'morada', 'codpostal', 'capitalsocial'], 'required','message'=>'Os campos selecionados são
            de preenchimento obrigatório'],
            [['capitalsocial'], 'number','message'=>'O campo capital social é do tipo número'],
            [['nomeempresa'], 'string', 'max' => 150,'message'=>'O campo nome empresa é do tipo texto e tem um máximo de 150 caracteres'],
            [['email', 'morada'], 'string', 'max' => 200,'message'=>'O campo nome empresa é do tipo texto e tem um máximo de 200 caracteres'],
            [['telefone'], 'integer','min'=>910000001, 'max' => 999999999,'message'=>'O campo telefone é do tipo inteiro e tem um máximo de 9 números'],
            [['codpostal'],'string','max'=>8],
            [['nif'], 'number', 'max' => 999999999,'min'=>100000001],
            [['localidade'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomeempresa' => 'Nomeempresa',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'nif' => 'Nif',
            'morada' => 'Morada',
            'codpostal' => 'Codpostal',
            'localidade' => 'Localidade',
            'capitalsocial' => 'Capitalsocial',
        ];
    }
}
