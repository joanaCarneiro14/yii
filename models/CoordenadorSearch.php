<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coordenador;

/**
 * CoordenadorSearch represents the model behind the search form of `app\models\Coordenador`.
 */
class CoordenadorSearch extends Coordenador
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_docente', 'id_departamento'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Coordenador::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_docente' => $this->id_docente,
            'id_departamento' => $this->id_departamento,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
        ]);

        return $dataProvider;
    }
}
