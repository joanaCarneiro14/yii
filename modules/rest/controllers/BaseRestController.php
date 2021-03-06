<?php


namespace app\modules\rest\controllers;


use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\Cors;

class BaseRestController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $behaviors=parent::behaviors(); // TODO: Change the autogenerated stub

        unset($behaviors['authentication']);

        $behaviors['corsFilter']=[
            'class'=> Cors::class,
            'cors'=>[
                'Origin'=>['*']
            ]

        ];

        $behaviors['authentication']=[
            'class'=>CompositeAuth::class,
            'authMethods'=>[
                HttpBasicAuth::class
            ]
        ];

        $behaviors['access'] = [
            'class'=>AccessControl::class,
            'rules'=>[
                [
                    'actions'=>['index','view','create','update','delete'],
                    'allow'=>true,
                    'roles'=>['admin']
                ]
            ]
        ];
        return $behaviors;
    }

}