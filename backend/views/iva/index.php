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

    <h1><?= Html::encode($this->title) ?></h1>

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
                        return 'Inativo';
                    }
                    else if($model->estado=='1'){
                        return 'Ativo';
                    }
                    else{
                        return 'Erro';
                    }
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update} ',
                'urlCreator' => function ($action, Iva $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],

    ]); ?>

</div>
