<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Coordenador".
 *
 * @property int $id_docente
 * @property int|null $id_departamento
 * @property string|null $data_inicio
 * @property string|null $data_fim
 *
 * @property Departamento $departamento
 * @property Docente $docente
 */
class Coordenador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Coordenador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_docente'], 'required'],
            [['id_docente', 'id_departamento'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['id_docente'], 'unique'],
            [['id_departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_departamento' => 'id']],
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
            'id_departamento' => 'Id Departamento',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
        ];
    }

    /**
     * Gets query for [[Departamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'id_departamento']);
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
