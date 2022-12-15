<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Iva $model */

$this->title = $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="iva-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descricao',
            'taxaiva',
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
