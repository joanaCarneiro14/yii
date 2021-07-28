<?php

namespace app\modules\rest\controllers;

use app\models\Coordenador;
use app\modules\rest\models\CoordenadorRest;
use Yii;

class CoordenadorController extends BaseRestController
{
    public $modelClass = Coordenador::class;

    public function behaviors()
    {
        $behaviors=parent::behaviors();
        $behaviors['access']['rules'][]=[
            'actions'=>['list'],
            'allow'=>true,
            'roles'=>['admin']
        ];
        return $behaviors;
    }
    public function actionList() {

        $searchModel = new CoordenadorRest();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $dataProvider;
    }
}

