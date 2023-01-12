<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Pedido;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;

class PedidoController extends ActiveController
{
    public $modelClass = 'common\models\Pedido';

    public function behaviors()
    {
        Yii::$app->params['auth_user_id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTotalgasto($id){
        $total=0.00;
        $pedidos=Pedido::find()->where((['profile_id'=>$id]))->all();
        if($pedidos!=null){
        foreach ($pedidos as $pedido)
        {
            $total=$total+$pedido->total;
        }
        return round($total,2);
        }
        return "Erro";

    }

}
