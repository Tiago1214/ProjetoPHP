<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Pedido;
use common\models\Profile;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;

class PedidoController extends ActiveController
{
    public $modelClass = 'common\models\Pedido';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if($action=="delete")
        {
            throw new \yii\web\ForbiddenHttpException('Não pode realizar estas operações','403');
        }
    }

    public function actions()
    {
        $actions= parent::actions();
        return $actions;
    }

    //Total gasto em todos os pedidos
    public function actionTotalgasto(){
        $total=0.00;
        $pedidos=Pedido::find()->where((['profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id')]))->all();
        if($pedidos!=null){
            foreach ($pedidos as $pedido)
            {
                $total=$total+$pedido->total;
            }
            return round($total,2);
        }
        return null;
    }

    //Função para saber quantos pedidos concluidos aquele cliente já teve no restaurante para dar a refeição de borla ao 10º
    public function actionNrtotalpedidos(){
        $nrpedidos=0;
        //obter o número de pedidos que estão concluidos
        $pedidos=Pedido::find()->where(['estado'=>'Concluído',
            'profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id')])->all();
        foreach ($pedidos as $pedido)
        {
            $nrpedidos=$nrpedidos+1;
        }
        if($nrpedidos!=null){
            return $nrpedidos;
        }
        return null;
    }

    //selecionar os pedidos do utilizador com sessão iniciada
    public function actionMeuspedidos(){
        $pedidos=Pedido::find()->where(['profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id')])->all();
        if($pedidos!=null){
            return $pedidos;
        }
        return null;
    }

    //mostrar todos os pedidos concluidos do utilizador
    public function actionPedidosconcluidos(){
        $pedidos=Pedido::find()->where(['estado'=>'Concluído',
            'profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id')])->all();
        if($pedidos!=null){
            return $pedidos;
        }
        return null;
    }

    //mostrar todos os pedidos cancelados
    public function actionPedidoscancelados(){
        $pedidos=Pedido::find()->where(['estado'=>'Cancelado',
            'profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id')])->all();
        if($pedidos!=null){
            return $pedidos;
        }
        return null;
    }

    //mostrar todos os pedidos em processamento
    public function actionPedidosemprocessamento(){
        $pedidos=Pedido::find()->where(['estado'=>'Em Processamento',
            'profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id')])->all();
        if($pedidos!=null){
            return $pedidos;
        }
        return null;
    }

    //mudar o estado do pedido selecionado para cancelado
    public function actionCancelarpedido($id){
        $pedido=Pedido::find()->where(['id'=>$id])->all();
        if($pedido!=null){
            //tem de se fazer um foreach para poder alterar o estado devido ao pedido selecionado estar num array
            foreach($pedido as $ped){
                $ped->estado='Cancelado';
                $ped->save();
            }
            return $ped;
        }
        throw new  \yii\web\ForbiddenHttpException('Pedido não existente','404');
    }
}
