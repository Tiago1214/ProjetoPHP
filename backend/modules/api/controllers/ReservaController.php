<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Profile;
use common\models\Reserva;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;

class ReservaController extends ActiveController
{
    public $modelClass = 'common\models\Reserva';

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
        if($action==="delete")
        {
            throw new \yii\web\ForbiddenHttpException('Proibido','403');
        }
    }

    public function actions()
    {
        $actions= parent::actions(); // TODO: Change the autogenerated stub
        unset($actions["delete"]);
        return $actions;
    }

    public function actionMinhasreservas($id){
        $reserva_search=Reserva::find()->where(['profile_id'=>$id])->all();
        if($reserva_search!=null){
            return $reserva_search;
        }
        throw new  \yii\web\ForbiddenHttpException('Este utilizador não tem nenhuma reserva criada','404');
    }

    //mudar o estado do pedido selecionado para cancelado
    public function actionCancelarreserva($id){
        if($id!=null){
            $reserva=Reserva::find()->where(['id'=>$id])->all();
            //tem de se fazer um foreach para poder alterar o estado devido ao pedido selecionado estar num array
            foreach($reserva as $res){
                //passar para o estado cancelado
                $res->estado=2;
                $res->save();
            }
            return $res;
        }
        throw new  \yii\web\ForbiddenHttpException('Não foi selecionado nenhum pedido','404');
    }

    //mandar as reservas de hoje do cliente
    public function actionReservashoje(){
        $reserva=Reserva::find()->where(['profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id'),
        'data'=>date('d/m/Y')])->all();
        if($reserva!=null){
            return $reserva;
        }
        throw new  \yii\web\ForbiddenHttpException('Não existe nenhuma reserva para hoje','404');
    }
}
