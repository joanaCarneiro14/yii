<?php


namespace app\modules\rest\models;


use app\models\Coordenador;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use Yii;

class CoordenadorRest extends Coordenador
{
    public function rules()
    {
        return [
            [['id_docente', 'id_departamento'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = (new Query())
            ->select(['Departamento.nome', 'Coordenador.data_inicio','Docente.nome as docente'])
            ->from('Coordenador')
            ->innerJoin('Docente', 'Coordenador.id_docente = Docente.id')
            ->innerJoin('Departamento', 'Coordenador.id_departamento = Departamento.id');


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