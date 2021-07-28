<?php

namespace app\modules\rest\controllers;


use app\models\Utilizador;
use app\modules\rest\models\UtilzadorRest;
use Yii;

class UtilizadorController extends BaseRestController
{

    public $modelClass = Utilizador::class;
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

    public function actionList(){
        $searchModel = new UtilzadorRest();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        return $dataProvider;
    }
}
