<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Yii;

/** @var yii\web\View $this */
/** @var backend\models\Artigo $model */

$this->title = 'Artigo :'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Artigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="artigo-view">


    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id,], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'descricao',
            'referencia',
            'preco',
            'data',
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
                'attribute'=>'imagem',
                'value'=>$model->imagemurl,
                'format'=>['image',['width'=>'100','height'=>'100']]
            ]
        ],
    ]) ?>

</div>
