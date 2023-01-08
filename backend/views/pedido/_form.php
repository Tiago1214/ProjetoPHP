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

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'tipo_pedido', '')->dropDownList([0=>'Restaurante',1=>'Takeaway']) ?>



    <?php
    echo  $form->field($model,'profile_id')->widget(Select2::className(),[
        'data' => ArrayHelper::map($profile, 'id','numcontribuinte'),
        'name' => 'profile_id',
        'attribute'=>'profile_id',
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'Selecione um cliente...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success','name'=>'pedido-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!--