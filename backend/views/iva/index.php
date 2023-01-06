<?php

use backend\models\Iva;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\IvaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-index">



    <p>
        <?= Html::a('Create Iva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'descricao',
            'taxaiva',
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
                            return Html::a('Ativar', ['/iva/estado', 'id' => $id], ['class'=>'btn btn-success btn-sm']) ;
                        }
                        else if($model->estado==1){
                            return Html::a('Desativar', ['/iva/estado', 'id' => $id], ['class'=>'btn btn-danger btn-sm']) ;
                        }
                    }
                ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}{Ativar}',
                'urlCreator' => function ($action, Iva $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],

    ]); ?>

</div>
