<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Projeto".
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $data_inicio
 * @property string|null $data_fim
 * @property string|null $local_realizacao
 * @property float|null $valor_financiado
 *
 * @property AutoriaProjeto $autoriaProjeto
 */
class Projeto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Projeto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_inicio', 'data_fim'], 'safe'],
            [['valor_financiado'], 'number'],
            [['titulo', 'local_realizacao'], 'string', 'max' => 50],
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
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
            'local_realizacao' => 'Local Realizacao',
            'valor_financiado' => 'Valor Financiado',
        ];
    }

    /**
     * Gets query for [[AutoriaProjeto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutoriaProjeto()
    {
        return $this->hasOne(AutoriaProjeto::className(), ['id_projeto' => 'id']);
    }
}
