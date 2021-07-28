<?php

namespace app\modules\rest\models;

use app\models\Utilizador;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;


class UtilzadorRest extends Utilizador
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['password', 'tipo', 'email'], 'safe'],
        ];
    }
    public function actionCriar(){
        $model = new Utilizador();

        $model->load(Yii::$app->request->post(),'');
        $model->save();

    }

    public  function search($params)
    {
        $query = (new Query())
            ->select(['Docente.nome','Utilzador.email','Utilizador.tipo as Função','Docente.id_departamento'])
            ->from('Utilizador')
            ->innerJoin('Docente', 'Utilizador.id = Docente.id_utilizador');

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