<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Artigo;
use common\models\Categoria;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;

class CategoriaController extends ActiveController
{
    public $modelClass = 'common\models\Categoria';

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
        if($action==="delete"||$action==="update"||$action==="create"||$action==="view")
        {
            throw new \yii\web\ForbiddenHttpException('Não pode realizar estas operações','403');
        }
    }

    //Redefinir métodos
    public function actions()
    {
        $actions= parent::actions();
        unset($actions["index"]);
        return $actions;
    }

    //mostrar só as categorias em que o estado é ativo ou 1
    public function actionIndex()
    {
        $categorias=Categoria::find()->where(['estado'=>1])->all();
        if($categorias!=null){
            return $categorias;
        }
        return null;
    }


    //mostrar categoria por nome
    public function actionCategorianome($nome){
        $categorias=Categoria::find()->where(['nome'=>$nome,'estado'=>1])->all();
        if($categorias!=null){
            return $categorias;
        }
        throw new \yii\web\ForbiddenHttpException('Não existe nenhuma categoria com este nome','404');
    }
}
