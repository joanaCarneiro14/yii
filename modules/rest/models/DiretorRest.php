<?php

namespace app\modules\rest\models;

use app\models\Diretor;
use yii\data\ActiveDataProvider;
use yii\db\Query;


class DiretorRest extends Diretor
{
    
    public function rules()
    {
        return [
            [['id_docente', 'id_escola'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
        ];
    }
    public function search($params)
    {
        $query = (new Query())
            ->select(['Docente.nome','Escola.sigla', 'Diretor.data_inicio'])
            ->from('Diretor')
            ->innerJoin('Docente', 'Diretor.id_docente = Docente.id')
            ->innerJoin('Escola', 'Diretor.id_escola = Escola.id');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }

}