<?php

use backend\models\MetodoPagamento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\MetodoPagamentoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Metodo Pagamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodo-pagamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Metodo Pagamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nomepagamento',
            [
                'attribute' => 'estado',
                'value' => function($model){
                    if($model->estado == '0'){
                        return 'Desativado';
                    }
                    else if($model->estado=='1'){
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
                            return Html::a('Ativar', ['/metodopagamento/estado', 'id' => $id], ['class'=>'btn btn-success btn-sm']) ;
                        }
                        else if($model->estado==1){
                            return Html::a('Desativar', ['/metodopagamento/estado', 'id' => $id], ['class'=>'btn btn-danger btn-sm']) ;
                        }
                    }
                ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}{Ativar}',
                'urlCreator' => function ($action, MetodoPagamento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
