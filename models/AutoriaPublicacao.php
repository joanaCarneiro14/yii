<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Autoria_Publicacao".
 *
 * @property int $id_autor
 * @property int $id_publicacao
 *
 * @property Publicacao $publicacao
 * @property Docente $autor
 */
class AutoriaPublicacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Autoria_Publicacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_autor', 'id_publicacao'], 'required'],
            [['id_autor', 'id_publicacao'], 'integer'],
            [['id_publicacao'], 'unique'],
            [['id_publicacao'], 'exist', 'skipOnError' => true, 'targetClass' => Publicacao::className(), 'targetAttribute' => ['id_publicacao' => 'id']],
            [['id_autor'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['id_autor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_autor' => 'Id Autor',
            'id_publicacao' => 'Id Publicacao',
        ];
    }

    /**
     * Gets query for [[Publicacao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublicacao()
    {
        return $this->hasOne(Publicacao::className(), ['id' => 'id_publicacao']);
    }

    /**
     * Gets query for [[Autor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Docente::className(), ['id' => 'id_autor']);
    }
}
