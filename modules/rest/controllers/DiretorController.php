<?php

namespace app\modules\rest\controllers;

use app\models\Diretor;
use app\modules\rest\models\DiretorRest;
use Yii;

class DiretorController extends BaseRestController
{
    public $modelClass = Diretor:: class;
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

        $searchModel = new DiretorRest();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $dataProvider;
    }
}


