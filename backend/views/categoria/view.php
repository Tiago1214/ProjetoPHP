<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Categoria $model */

$this->title = 'Categoria :'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categoria-view">


    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'descricao',
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
        ],
    ]) ?>

</div>
