<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Escola".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $sigla
 * @property int|null $id_instituição
 *
 * @property Departamento[] $departamentos
 * @property Diretor[] $diretors
 * @property Instituicao $instituição
 */
class Escola extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Escola';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_instituição'], 'integer'],
            [['nome', 'sigla'], 'string', 'max' => 50],
            [['id_instituição'], 'exist', 'skipOnError' => true, 'targetClass' => Instituicao::className(), 'targetAttribute' => ['id_instituição' => 'id']],
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
            'sigla' => 'Sigla',
            'id_instituição' => 'Id Instituição',
        ];
    }

    /**
     * Gets query for [[Departamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentos()
    {
        return $this->hasMany(Departamento::className(), ['id_escola' => 'id']);
    }

    /**
     * Gets query for [[Diretors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiretors()
    {
        return $this->hasMany(Diretor::className(), ['id_escola' => 'id']);
    }

    /**
     * Gets query for [[Instituição]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstituição()
    {
        return $this->hasOne(Instituicao::className(), ['id' => 'id_instituição']);
    }
}
