<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Linhapedido;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;

class LinhapedidoController extends ActiveController
{
    public $modelClass = 'common\models\Linhapedido';

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

    public function actionLinhasdopedido($id){
        $linha_search=Linhapedido::find()->where(['pedido_id'=>$id])->all();
        if($linha_search!=null){
            return $linha_search;
        }
        return 'Este pedido não tem linhas de pedido';
    }

}
