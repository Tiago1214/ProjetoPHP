<?php

use backend\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\CategoriaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'descricao',
            [
                'attribute' => 'estado',
                'value' => function($model){
                    if($model->estado == 0){
                        return 'Inativo';
                    }
                    else if($model->estado==1){
                        return 'Ativo';
                    }
                    else{
                        return 'Erro';
                    }
                }
            ],
            [
                'buttons' => [
                    'Ativar' => function($url,$model, $id) {     // render your custom button
                        if($model->estado==0){
                            return Html::a('Ativar', ['/categoria/estado', 'id' => $id], ['class'=>'btn btn-success']) ;
                        }
                        else if($model->estado==1){
                            return Html::a('Desativar', ['/categoria/estado', 'id' => $id], ['class'=>'btn btn-danger']) ;
                        }
                    }
                ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}{Ativar}',
                'urlCreator' => function ($action, Categoria $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
