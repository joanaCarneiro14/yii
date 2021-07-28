<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Instituicao".
 *
 * @property int $id
 * @property string|null $nome
 *
 * @property Escola[] $escolas
 */
class Instituicao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Instituicao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * Gets query for [[Escolas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEscolas()
    {
        return $this->hasMany(Escola::className(), ['id_instituição' => 'id']);
    }
}
