<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Desporto".
 *
 * @property int $id
 * @property string $nome
 * @property int $frequencia
 * @property int $id_utilizador
 *
 * @property Utilizador $utilizador
 */
class Desporto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Desporto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'frequencia', 'id_utilizador'], 'required'],
            [['frequencia', 'id_utilizador'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizador::className(), 'targetAttribute' => ['id_utilizador' => 'id']],
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
            'frequencia' => 'Frequencia',
            'id_utilizador' => 'Id Utilizador',
        ];
    }

    /**
     * Gets query for [[Utilizador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasOne(Utilizador::className(), ['id' => 'id_utilizador']);
    }
}
