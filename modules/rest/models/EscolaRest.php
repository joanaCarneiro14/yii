<?php


namespace app\modules\rest\models;

use app\models\Escola;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class EscolaRest extends Escola
{
    public function rules()
    {
        return [
            [['id', 'id_instituição'], 'integer'],
            [['nome', 'sigla'], 'safe'],
        ];


    }
    public function search($params)
    {
        $query = (new Query())
            ->select(['Escola.nome as Escola','Escola.sigla','Instituicao.nome as Instiuicao'])
            ->from('Escola')
            ->innerJoin('Instituicao', 'Instituicao.id = Escola.id_instituição');


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