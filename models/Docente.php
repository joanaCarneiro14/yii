<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Docente".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property string|null $nome
 * @property int|null $id_departamento
 *
 * @property AutoriaProjeto[] $autoriaProjetos
 * @property AutoriaPublicacao[] $autoriaPublicacaos
 * @property Coordenador $coordenador
 * @property Diretor $diretor
 * @property Utilizador $utilizador
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Docente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_utilizador'], 'required'],
            [['id_utilizador', 'id_departamento'], 'integer'],
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
            'id_utilizador' => 'Id Utilizador',
            'nome' => 'Nome',
            'id_departamento' => 'Id Departamento',
        ];
    }

    /**
     * Gets query for [[AutoriaProjetos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutoriaProjetos()
    {
        return $this->hasMany(AutoriaProjeto::className(), ['id_autor' => 'id']);
    }

    /**
     * Gets query for [[AutoriaPublicacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutoriaPublicacaos()
    {
        return $this->hasMany(AutoriaPublicacao::className(), ['id_autor' => 'id']);
    }

    /**
     * Gets query for [[Coordenador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoordenador()
    {
        return $this->hasOne(Coordenador::className(), ['id_docente' => 'id']);
    }

    /**
     * Gets query for [[Diretor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiretor()
    {
        return $this->hasOne(Diretor::className(), ['id_docente' => 'id']);
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
