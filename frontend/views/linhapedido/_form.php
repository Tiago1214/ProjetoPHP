<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\LinhaPedido $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="linha-pedido-form">
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>

    <?php $form = ActiveForm::begin(); ?>

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
                    <th>User Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $subtotal=0;
                $ivatotal=0;
                $total=0;
                ?>
                <?php  foreach($linhaspedido as $linha){

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
                        <td>
                            <?= Html::a('Editar Qtd',['linhapedido/editquant',
                                'id'=>$linha->id],['class'=>'btn btn-warning btn-sm'])?>
                            <?=Html::a('Apagar', ['linhapedido/delete','id'=>$linha->id,'idp'=>$linha->pedido_id],
                                [
                                    'data' => [
                                        'method' => 'post',
                                        // use it if you want to confirm the action
                                        'confirm' => 'Are you sure?',
                                    ],
                                    'class' => 'btn btn-danger btn-sm'
                                ]
                            );?>
                        </td>

                    </tr>
                <?php }?>

                <?php if(!is_null($pedido)) {
                    $form = ActiveForm::begin();
                    ?>

                    <tr>
                        <td><?php
                            echo  $form->field($model,'artigo_id')->dropDownList(ArrayHelper::map($artigo, 'id', 'nome'));
                            /*widget(Select2::className(),[
                                'data' => ArrayHelper::map($artigo, 'id','nome'),
                                'name' => 'artigo_id',
                                'attribute'=>'artigo_id',
                                'size' => Select2::MEDIUM,
                                'options' => ['placeholder' => 'Selecione um produto...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) */?>
                        </td>
                        <td><?= $form->field($model,'quantidade')->textInput() ?></td>
                        <td>
                            <div class="form-group">
                                <br>
                                <?= Html::submitButton('Adicionar Artigo', ['class' => 'btn btn-success ','name'=>'artigo-button']) ?>
                            </div>
                        </td>
                    </tr>


                    <?php ActiveForm::end(); ?>
                <?php }else
                { ?>
                <?php }?>


                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-9">
        </div>
        <!-- /.col -->
        <div class="col-xs-3">
            <div class="table-responsive">
                <table class="table text-end">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?= $subtotal."€" ?></td>
                    </tr>
                    <tr>
                        <th>IVA:</th>
                        <td><?= $ivatotal."€"?></td>
                        <input type="hidden" name="ivatotal" value="<?= $ivatotal?>">
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td name="valortotal">
                            <?= $total=$total+($subtotal+$ivatotal); ?>€
                            <input type="hidden" name="total" value="<?= $total?>">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row no-print">
            <div class="col-lg-2"></div>
            <div class="col-lg-2"></div>
            <div class="col-lg-2"></div>
            <div class="col-lg-2"></div>
            <div class="col-lg-2"></div>

            <div class="col-lg-2" style="text-align: right">
                <?php  foreach($pedido as $ped){
                    //Verificar se existem linhas de pedido para mostrar o botão de finalizar pedido
                    if($ped->linhaPedidos==true){
                        ?>
                        <?php echo Html::a('Finalizar Pedido', ['/pedido/finalizarpedido', 'idp' =>$ped->id ]
                            , ['class'=>'btn btn-success ','name'=>'finalizar-pedido']) ; ?>
                        <?php
                    }
                    ?>

                    <?php
                }?>
            </div>
        </div>

        <br>
        <!-- /.col -->
    </div>
    </section>
</div>

