<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
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
        if($action==="delete"||$action==="update")
        {
            throw new \yii\web\ForbiddenHttpException('Proibido');
        }
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMinhasreservas($id){
        $reserva_search=Reserva::find()->where(['profile_id'=>$id])->all();
        if($reserva_search!=null){
            return $reserva_search;
        }
        return 'Este utilizador não tem nenhuma reserva criada';
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
        return 'Não foi selecionado nenhum pedido';
    }
}
