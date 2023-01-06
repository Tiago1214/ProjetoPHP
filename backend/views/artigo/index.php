<?php

use common\models\Artigo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ArtigoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Artigos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artigo-index">


    <p>
        <?= Html::a('Criar Artigo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'descricao',
            'referencia',
            [
                'attribute' => 'preco',
                'value' => function($model){
                    return $model->preco.'€';
                }
            ],
            //'data',
            //'imagem',
            [
                'attribute' => 'iva_id',
                'value' => function($model){
                    return $model->iva->taxaiva.'%';
                }
            ],
            [
                'attribute' => 'categoria_id',
                'value' => function($model){
                    return $model->categoria->nome;
                }
            ],
            [
                'attribute' => 'estado',
                'value' => function($model){
                    if($model->estado == 0){
                        return 'Desativado';
                    }
                    else if($model->estado==1){
                        return 'Ativado';
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

                            return Html::a('Ativar', ['/artigo/estado', 'id' => $model->id], ['class'=>'btn btn-success btn-sm']) ;
                        }
                        else if($model->estado==1){
                            return Html::a('Desativar', ['/artigo/estado', 'id' => $model->id], ['class'=>'btn btn-danger btn-sm']) ;
                        }
                    }
                ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}{Ativar}',
                'urlCreator' => function ($action, Artigo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id,]);
                 }
            ],
        ],
    ]); ?>


</div>
