<?php

namespace app\modules\rest\controllers;

use app\models\Escola;
use app\modules\rest\models\EscolaRest;
use Yii;

class EscolaController extends BaseRestController

{
    public $modelClass = Escola::class;

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

        $searchModel = new EscolaRest();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        Return $dataProvider;
    }
}
