<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Utilizador".
 *
 * @property int $id
 * @property string|null $password
 * @property string|null $tipo
 * @property string|null $email
 *
 * @property Docente[] $docentes
 */
class Utilizador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Utilizador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'tipo', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'password' => 'Password',
            'tipo' => 'Tipo',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Docentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['id_utilizador' => 'id']);
    }
}
