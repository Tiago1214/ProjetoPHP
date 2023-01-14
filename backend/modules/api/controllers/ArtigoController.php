<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Categoria;
use common\models\Comentario;
use http\Params;
use yii\db\ActiveRecord;
use yii\filters\auth\QueryParamAuth;
use common\models\Artigo;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use Yii;
use yii\web\ForbiddenHttpException;


class ArtigoController extends ActiveController
{
    public $modelClass = 'common\models\Artigo';

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
        if($action==="delete"||$action==="update"||$action==="create")
        {
            throw new \yii\web\ForbiddenHttpException('Não pode realizar estas operações','403');
        }
    }

    //Redefinir métodos
    public function actions()
    {
        $actions= parent::actions();
        unset($actions["index"],$actions["delete"],$actions["update"],$actions["create"],$actions["view"]);
        return $actions;
    }

    //mostrar só os artigos que se encontram ativos
    public function actionIndex()
    {
        $artigos=Artigo::find()->where(['estado'=>1])->all();
        if($artigos!=null){
            return $artigos;
        }
        throw new \yii\web\ForbiddenHttpException('Não foi encontrado nenhum artigo','404');
    }

    //mostrar um artigo específico
    public function actionView($id)
    {
        $artigos=Artigo::find()->where(['id'=>$id,'estado'=>1])->all();
        if($artigos!=null){
            return $artigos;
        }
        throw new \yii\web\ForbiddenHttpException('Não foi encontrado nenhum artigo','404');
    }

    //Fazer pesquisa dos artigos pelo nome em vez de id, ou seja usar texto na url
    public function actionArtigopornome($nome){
        $artigo_search=Artigo::find()->where(['nome'=>$nome])->all();
        if($artigo_search!=null){
            return $artigo_search;
        }
        throw new  \yii\web\ForbiddenHttpException('Este artigo não existe','404');
    }

    //Fazer pesquisa de todos os artigos de uma respetiva categoria
    public function actionArtigosdacategoria($nome){
        $categoria_search=Artigo::find()->where(['categoria_id'=>Categoria::find()->where(['nome'=>$nome])->select('id')])->all();
        if($categoria_search!=null){
            return $categoria_search;
        }
        throw new  \yii\web\ForbiddenHttpException('Não existe nenhum artigo nesta categoria','404');
    }
}
