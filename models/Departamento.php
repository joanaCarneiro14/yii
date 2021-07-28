<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Departamento".
 *
 * @property int $id
 * @property int|null $id_escola
 * @property string|null $nome
 *
 * @property Coordenador[] $coordenadors
 * @property Escola $escola
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_escola'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['id_escola'], 'exist', 'skipOnError' => true, 'targetClass' => Escola::className(), 'targetAttribute' => ['id_escola' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_escola' => 'Id Escola',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Coordenadors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoordenadors()
    {
        return $this->hasMany(Coordenador::className(), ['id_departamento' => 'id']);
    }

    /**
     * Gets query for [[Escola]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEscola()
    {
        return $this->hasOne(Escola::className(), ['id' => 'id_escola']);
    }
}
