<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var backend\models\Pedido $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pedido-form">
    <h1>Finalizar Pedido</h1>
    <?php $form = ActiveForm::begin(); ?>


    <?php echo  $form->field($model,'metodo_pagamento_id')->widget(Select2::className(),[
    'data' => ArrayHelper::map($metodospagamento, 'id','nomepagamento'),
    'name' => 'metodo_pagamento_id',
    'attribute'=>'metodo_pagamento_id',
    'size' => Select2::MEDIUM,
    'options' => ['placeholder' => 'Selecione um método de pagamento...'],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]) ?>

    <?php $total=0 ;
    foreach($linhaspedido as $linha){
        $total=$total+($linha->valorunitario*$linha->quantidade);
    }

    echo $form->field($model,'total')->textInput(['value'=>$total,'readonly'=>true]);
    ?>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success','name'=>'pedido-mesa-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
