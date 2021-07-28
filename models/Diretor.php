<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Diretor".
 *
 * @property int $id_docente
 * @property int $id_escola
 * @property string|null $data_inicio
 * @property string|null $data_fim
 *
 * @property Escola $escola
 * @property Docente $docente
 */
class Diretor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Diretor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_docente', 'id_escola'], 'required'],
            [['id_docente', 'id_escola'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['id_docente'], 'unique'],
            [['id_escola'], 'exist', 'skipOnError' => true, 'targetClass' => Escola::className(), 'targetAttribute' => ['id_escola' => 'id']],
            [['id_docente'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['id_docente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_docente' => 'Id Docente',
            'id_escola' => 'Id Escola',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
        ];
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

    /**
     * Gets query for [[Docente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['id' => 'id_docente']);
    }
}
