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


    <?= $form->field($model, 'tipo_pedido')->dropDownList([0=>'Restaurante',1=>'Takeaway']) ?>

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


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
