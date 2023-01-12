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
        Yii::$app->params['auth_user_id'] = 0;
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

}
