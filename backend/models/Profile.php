<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $numcontribuinte
 * @property string $email
 * @property string $telemovel
 * @property string $estado
 * @property int $user_id
 *
 * @property Comentario[] $comentarios
 * @property Pedido[] $pedidos
 * @property Reserva[] $reservas
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numcontribuinte', 'email', 'telemovel', 'estado', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['numcontribuinte', 'telemovel'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 200],
            [['estado'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numcontribuinte' => 'Numcontribuinte',
            'email' => 'Email',
            'telemovel' => 'Telemovel',
            'estado' => 'Estado',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::class, ['profile_id' => 'id']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['profile_id' => 'id']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['profile_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
