<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Autoria_Projeto".
 *
 * @property int $id_autor
 * @property int $id_projeto
 *
 * @property Projeto $projeto
 * @property Docente $autor
 */
class AutoriaProjeto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Autoria_Projeto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_autor', 'id_projeto'], 'required'],
            [['id_autor', 'id_projeto'], 'integer'],
            [['id_projeto'], 'unique'],
            [['id_projeto'], 'exist', 'skipOnError' => true, 'targetClass' => Projeto::className(), 'targetAttribute' => ['id_projeto' => 'id']],
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
            'id_projeto' => 'Id Projeto',
        ];
    }

    /**
     * Gets query for [[Projeto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjeto()
    {
        return $this->hasOne(Projeto::className(), ['id' => 'id_projeto']);
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
