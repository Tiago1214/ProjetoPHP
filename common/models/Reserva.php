<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property string $data
 * @property string $hora
 * @property int $nrpessoas
 * @property int $estado
 * @property int $profile_id
 *
 * @property Profile $profile
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'hora', 'nrpessoas', 'estado', 'profile_id'], 'required'],
            [['nrpessoas', 'estado', 'profile_id'], 'integer'],
            [['data', 'hora'], 'string', 'max' => 45],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['profile_id' => 'id']],
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
            'hora' => 'Hora',
            'nrpessoas' => 'Nrpessoas',
            'estado' => 'Estado',
            'profile_id' => 'Profile ID',
        ];
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