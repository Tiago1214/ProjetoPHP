<?php

use common\models\Profile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ProfileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Utilizadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Nome de Utilizador',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            [
                'attribute' => 'Email',
                'value' => function($model){
                    return $model->user->email;
                }
            ],
            'numcontribuinte',
            'telemovel',
            [
                'attribute' => 'estado',
                'value' => function($model){
                    if($model->estado == 0){
                        return 'Desativo';
                    }
                    else if($model->estado==1){
                        return 'Ativo';
                    }
                    else{
                        return 'Erro';
                    }
                }
            ],
            //'user_id',
            [
                'buttons' => [
                    'Ativar' => function($url,$model, $id) {     // render your custom button
                        if($model->estado==0){

                            return Html::a('Ativar', ['/profile/estado', 'id' => $model->id], ['class'=>'btn btn-success btn-sm']) ;
                        }
                        else if($model->estado==1){
                            return Html::a('Desativar', ['/profile/estado', 'id' => $model->id], ['class'=>'btn btn-danger btn-sm']) ;
                        }
                    }
                ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}{Ativar}',
                'urlCreator' => function ($action, Profile $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
