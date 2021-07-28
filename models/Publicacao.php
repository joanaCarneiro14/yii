<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Publicacao".
 *
 * @property int $id
 * @property string $titulo
 * @property string $data_finalizacao
 * @property string $local_realizacao
 * @property string $tipo
 *
 * @property AutoriaPublicacao $autoriaPublicacao
 */
class Publicacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Publicacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'data_finalizacao', 'local_realizacao', 'tipo'], 'required'],
            [['data_finalizacao'], 'safe'],
            [['titulo'], 'string', 'max' => 50],
            [['local_realizacao', 'tipo'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'data_finalizacao' => 'Data Finalizacao',
            'local_realizacao' => 'Local Realizacao',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[AutoriaPublicacao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutoriaPublicacao()
    {
        return $this->hasOne(AutoriaPublicacao::className(), ['id_publicacao' => 'id']);
    }
}
