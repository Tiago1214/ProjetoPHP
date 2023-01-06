<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\MetodoPagamento $model */

$this->title = 'Método Pagamento: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Metodo Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="metodo-pagamento-view">


    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
