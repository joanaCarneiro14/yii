<?php


namespace app\modules\rest\controllers;


use amnah\yii2\user\models\forms\LoginForm;
use Yii;
use yii\rest\Controller;

class AuthController extends Controller
{
    public function actionIndex(){

        $model= new LoginForm();

        if($model->load(Yii::$app->request->post(), '') && $model->validate())
        {
            Yii::$app->user->login($model->getUser());
            return ['access_token' => Yii::$app->user->identity->access_token];
        }
        else{
            $model->validate();
            return $model;
        }


    }
}