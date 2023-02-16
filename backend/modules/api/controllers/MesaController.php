<?php

namespace backend\modules\api\controllers;

use backend\models\Mesa;
use backend\modules\api\components\CustomAuth;
use Yii;
use yii\rest\ActiveController;

class MesaController extends ActiveController
{
    public $modelClass = 'common\models\Mesa';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    //atribuir permissões
    public function checkAccess($action, $model = null, $params = [])
    {
        if($action==="update"||$action=="delete"||$action==="view"||$action=="create")
        {
            throw new \yii\web\ForbiddenHttpException('Não pode realizar estas operações','403');
        }
    }

    public function actions()
    {
        $actions= parent::actions();
        return $actions;
    }

    public function actionEscolhermesa(){
        $mesa=Mesa::find()->all();
        return ["mesa"=>$mesa];
    }
}
