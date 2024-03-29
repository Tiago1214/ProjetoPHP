<?php

namespace backend\modules\api\controllers;

use backend\models\Metodopagamento;
use backend\modules\api\components\CustomAuth;
use yii\rest\ActiveController;
use Yii;

class MetodopagamentoController extends ActiveController
{
    public $modelClass = 'backend\models\Metodopagamento';

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
        if($action==="update"||$action=="delete"||$action==="view"||$action==="create")
        {
            throw new \yii\web\ForbiddenHttpException('Não pode realizar estas operações','403');
        }
    }

    public function actions()
    {
        $actions= parent::actions();
        unset($actions["index"]);//,$actions["update"],$actions["delete"],$actions["view"],$actions["create"]
        return $actions;
    }

    //mostrar apenas os métodos de pagamento em que o estado é ativo ou 1

    public function actionIndex(){
        $metodos=Metodopagamento::find()->where(['estado'=>1])->all();
        if($metodos!=null){
            return $metodos;
        }
        return 'Não existem métodos de pagamento';
    }
}
