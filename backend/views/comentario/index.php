<?php

use common\models\Comentario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ComentarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Comentários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-index">
    <?php
    if(Yii::$app->user->can('createcomentario')){
        ?>
        <p>
            <?= Html::a('Criar Comentário', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php
    }
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo',
            'descricao',
            'profile_id',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{delete}',
                'urlCreator' => function ($action, Comentario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
