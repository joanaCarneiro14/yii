<?php

namespace app\modules\rest\controllers;


use app\models\Docente;
use app\modules\rest\models\DocenteRest;
use Yii;

class DocenteController extends BaseRestController
{
    public $modelClass = Docente::class;

    public function behaviors()
    {
        $behaviors=parent::behaviors();
        $behaviors['access']['rules'][]=[
            'actions'=>['listprojeto','listpublicacoes'],
            'allow'=>true,
            'roles'=>['admin']
        ];
        return $behaviors;
    }

    public function actionListprojeto() {
        $searchModel = new DocenteRest();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $dataProvider;
    }

    public function actionListpublicacoes() {
        $searchModel = new DocenteRest();
        $dataProvider = $searchModel->search2(Yii::$app->request->get());

        return $dataProvider;
    }
}
