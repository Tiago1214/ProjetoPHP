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
                        <td><?=$linha->valoriva * $linha->quantidade. "€"?></td>
                        <td> <?=$linha->artigo->preco*$linha->quantidade+$linha->valoriva * $linha->quantidade. "€"?></td>

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
                            <div class="form-group">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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
                    <button type="submit" class="btn btn-success">Gerar</button>

                </div>
            </div>

        <br>
        <!-- /.col -->
    </div>
    </section>
</div>

