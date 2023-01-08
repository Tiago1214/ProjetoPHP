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


    <?= $form->field($model, 'id')->textInput(['readonly'=>'true','value'=>$model->id]) ?>

    <?= $form->field($model, 'tipo_pedido')->dropDownList([0=>'Restaurante',1=>'Takeaway'],['readonly'=>'true']) ?>

    <?php echo $form->field($model,'mesa_id')->widget(Select2::className(),[
        'data' => ArrayHelper::map($mesa, 'id','nrmesa'),
        'name' => 'mesa_id',
        'attribute'=>'mesa_id',
        'size' => Select2::MEDIUM,
        'options' => ['placeholder' => 'Selecione uma mesa...'],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success','name'=>'pedido-mesa-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
