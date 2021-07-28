<?php

namespace app\modules\rest\models;

use app\models\Docente;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;


class DocenteRest extends Docente
{

    public function rules()
    {
        return [
            [['id', 'id_utilizador', 'id_departamento'], 'integer'],
            [['nome'], 'safe'],
        ];
    }


    public function search($params)
    {
        $query = (new Query())
            ->select(['Docente.nome','Utilizador.tipo', 'count(Projeto.id) as numeroProjetos'])
            ->from('Docente')
            ->innerJoin('Utilizador', 'Docente.id_utilizador = Utilizador.id')
            ->innerJoin('Autoria_Projeto', 'Autoria_Projeto.id_autor = Docente.id')
            ->innerJoin('Projeto', 'Projeto.id = Autoria_Projeto.id_projeto')
            ->groupBy(['Utilizador.tipo', 'Docente.nome']);



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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_utilizador' => $this->id_utilizador,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }

    public function search2($params)
    {
        $query = (new Query())
            ->select(['Docente.nome','Utilizador.tipo', 'count(Publicacao.id) as numero_publicações'])
            ->from('Docente')
            ->innerJoin('Utilizador', 'Docente.id_utilizador = Utilizador.id')
            ->innerJoin('Autoria_Publicacao', 'Autoria_Publicacao.id_autor = Docente.id')
            ->innerJoin('Publicacao', 'Publicacao.id = Autoria_Publicacao.id_publicacao')
            ->groupBy(['Utilizador.tipo', 'Docente.nome']);



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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_utilizador' => $this->id_utilizador,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }


}