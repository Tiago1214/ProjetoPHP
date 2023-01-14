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
        /*if($action==="update")
        {
            throw new \yii\web\ForbiddenHttpException('Não pode realizar estas operações');
        }*/
    }

    public function actions()
    {

        $actions= parent::actions();
        return $actions;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    //linhas de pedido do pedido selecionado
    public function actionLinhasdopedido($id){
        $linha_search=Linhapedido::find()->where(['pedido_id'=>$id])->all();
        if($linha_search!=null){
            return $linha_search;
        }
        throw new  \yii\web\ForbiddenHttpException('Este pedido não tem linhas de pedido','404');
    }

    //saber preço total de pedido, iva total e preço total sem iva
    public function actionLinhaspedidoestatisca($id){
        $totalvaluni=0;
        $totaliva=0;
        $total=0;
        $linha_search=Linhapedido::find()->where(['pedido_id'=>$id])->all();
        foreach($linha_search as $linha){
            $totalvaluni=$totalvaluni+$linha->valor_unitario*$linha->quantidade;
            $totaliva=$totaliva+($linha->valor_unitario*$linha->taxaiva/100*$linha->quantidade);
        }
        $total=$totaliva+$totalvaluni;
        if($linha_search!=null){
            return [
                'total'=>$total,
                'totalvaluni'=>$totalvaluni,
                'totaliva'=>$totaliva,
            ];
        }
        throw new  \yii\web\ForbiddenHttpException('Não existe valores neste pedido','404');
    }
}
