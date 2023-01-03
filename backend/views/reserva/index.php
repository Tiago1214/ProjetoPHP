<?php

use common\models\Reserva;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ReservaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="btn-toolbar pull-right">
            <?= Html::a('Mostrar todas as reservas', ['/reserva/index'], [
                'class' => 'btn btn-primary btn','style'=>'margin: 8px']);?>
            <?= Html::a('Mostrar reservas aceites', ['/reserva/reservasaceites'], [
                'class' => 'btn btn-primary btn','style'=>'margin: 8px']) ?>
            <?= Html::a('Mostrar reservas canceladas', ['/reserva/reservascanceladas'], [
                'class' => 'btn btn-primary btn','style'=>'margin: 8px']) ?>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'data',
            'hora',
            'nrpessoas',
            [
                'attribute' => 'estado',
                'value' => function ($model) {
                    if ($model->estado == 0) {
                        return 'Á espera de confirmação';
                    } else if ($model->estado == 1) {
                        return 'Confirmado';
                    } else if ($model->estado == 2) {
                        return 'Recusado';
                    } else {
                        return 'Erro';
                    }
                }
            ],
            [
                'attribute'=>'profile_id',
                'value'=>function($model){
                    return $model->profile->user->username;
                }
            ],
            [
                'buttons' => [
                    'Aceitar' => function($url,$model, $id) {     // render your custom button
                        if($model->estado==0){
                            return Html::a('Aceitar', ['/reserva/aceitar', 'id' => $id], [
                                'class' => 'btn btn-success btn-sm',
                                'data' => [
                                    'confirm' => 'Tem a certeza que pretende aceitar esta reserva?',
                                    'method' => 'post',
                                ],]);
                        }
                    },
                    'Recusar'=>function($url,$model,$id){
                        if($model->estado==0){
                            return Html::a('Recusar', ['/reserva/recusar', 'id' => $id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Tem a certeza que pretende recusar esta reserva?',
                                    'method' => 'post',
                                ],]);
                        }
                    }
                ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{Aceitar}{Recusar}',
                'urlCreator' => function ($action, Reserva $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
</div>
