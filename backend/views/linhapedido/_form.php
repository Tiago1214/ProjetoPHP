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

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-12 table-responsive">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>REF</th>
                    <th>Descrição</th>
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
                <?php   foreach($linhaspedido as $linha){

                    $subtotal=$subtotal+$linha->artigo->preco*$linha->quantidade;
                    $ivatotal=$ivatotal+($linha->valoriva * $linha->quantidade);
                    ?>
                    <tr>
                        <td> <?=  $linha->artigo->id  ; ?> </td>
                        <td> <?=  $linha->artigo->nome  ; ?></td>
                        <td><?=  $linha->quantidade  ; ?></td>
                        <td> <?= $linha->valorunitario."€" ; ?></td>
                        <td> <?= $linha->artigo->iva->taxaiva."%" ; ?></td>
                        <td><?=$linha->valoriva ."€"?></td>
                        <td> <?=$linha->artigo->preco*$linha->quantidade+$linha->valoriva * $linha->quantidade. "€"?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Editar
                            </button>
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
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="number" id="quantidade" name="quantidade" value="<?= $linha->quantidade?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                            <?=Html::a('Guardar',['linhapedido/editquantidade','idlp'=>$linha->id],['class'=>'btn btn-success btn-sm']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php }?>

                <?php if(true) {
                    $form = ActiveForm::begin();
                    ?>

                    <tr>
                        <td><?php
                            echo  $form->field($model,'artigo_id')->widget(Select2::className(),[
                                'data' => ArrayHelper::map($artigo, 'id','nome'),
                                'name' => 'artigo_id',
                                'attribute'=>'artigo_id',
                                'size' => Select2::MEDIUM,
                                'options' => ['placeholder' => 'Selecione um produto...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </td>
                        <td><?= $form->field($model,'quantidade')->textInput() ?></td>
                        <td>
                            <div class="hidden" id="pDetails">
                                <?php echo  $form->field($model,'mesa_id')->widget(Select2::className(),[
                                    'data' => ArrayHelper::map($mesa, 'id','nrmesa'),
                                    'name' => 'mesa_id',
                                    'attribute'=>'mesa_id',
                                    'size' => Select2::MEDIUM,
                                    'options' => ['placeholder' => 'Selecione uma mesa...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>

                            </div>
                            ..
                            <script>
                                $('.tipo_pedido').change(function(){
                                    var responseID = $(this).val();
                                    if(responseID ==1){
                                        $('#pDetails').removeClass("hidden");
                                        $('#pDetails').addClass("show");
                                    } else{
                                        $('#pDetails').removeClass("show");
                                        $('#pDetails').addClass("hidden");
                                    }
                                    console.log(responseID);
                                });
                            </script>
                        </td>
                        <td>
                            <div class="form-group">
                                <?= Html::submitButton('Adicionar Artigo', ['class' => 'btn btn-success']) ?>
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
                <div class="col-lg-2">
                    <?php  foreach($pedido as $ped){
                        ?>
                        <?php echo Html::a('Ativar', ['/pedido/finalizarpedido', 'idp' =>$ped->id ], ['class'=>'btn btn-success']) ; ?>
                    <?php
                    }?>

                </div>
            </div>

        <br>
        <!-- /.col -->
    </div>
    </section>
</div>

