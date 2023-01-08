<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Pedido $model */

$this->title = 'Pedido nr:'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-view">
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>


    <p>
        <?php if($model->estado=='Concluído'){
            ?>
            <?php
        }else{
            ?>
            <?= Html::a('Atualizar', ['linhapedido/create', 'idp' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'profile_id',
                'value' => function($model){
                    return $model->profile->user->username;
                }
            ],
            'data',
            [
                'attribute'=>'tipo_pedido',
                'value'=>function($model){
                    if($model->tipo_pedido==0){
                        return 'Restaurante';
                    }else{
                        return 'Takeaway';
                    }
                }
            ],
            [
                'attribute'=>'metodo_pagamento_id',
                'value'=>function($model){
                    if($model->metodo_pagamento_id!=null){
                        return $model->metodoPagamento->nomepagamento;
                    }
                    else{
                        return 'Pedido ainda em processamento';
                    }
                }
            ],
            [
                'attribute'=>'mesa_id',
                'value'=>function($model){
                    if($model->tipo_pedido==1){

                    }
                    else{
                        return $model->mesa->nrmesa;
                    }
                }
            ],
            [
                'attribute'=>'total',
                'value'=>function($model){
                    return $model->total.'€';
                }
            ],
        ],
    ]) ?>
    <h1>Detalhes de pedido:</h1>
    <div class="row">
        <div class="col-xs-12 table-responsive">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>REF</th>
                    <th>Produto</th>
                    <th>QTD #</th>
                    <th>Valor Un.</th>
                    <th>Taxa IVA</th>
                    <th>Valor IVA</th>
                    <th>Valor Total</th>
                </tr>
                </thead>
                <tbody>
                <?php $subtotal=0;
                $ivatotal=0;
                $total=0;
                ?>
                <?php  foreach($linhapedido as $linha){

                    $subtotal=$subtotal+$linha->artigo->preco*$linha->quantidade;
                    $ivatotal=$ivatotal+($linha->valoriva * $linha->quantidade);
                    ?>
                    <tr>
                        <td> <?=  $linha->artigo->referencia  ; ?> </td>
                        <td> <?=  $linha->artigo->nome  ; ?></td>
                        <td> <?=$linha->quantidade ;?> </td>
                        <td> <?= $linha->valorunitario."€" ; ?></td>
                        <td> <?= $linha->artigo->iva->taxaiva."%" ; ?></td>
                        <td><?=$linha->valoriva ."€"?></td>
                        <td> <?=$linha->artigo->preco*$linha->quantidade+$linha->valoriva * $linha->quantidade. "€"?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>


</div>
