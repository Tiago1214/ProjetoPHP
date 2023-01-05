<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Criar novo utilizador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <div class="row">
        <div class="col-lg-12">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?php ?>

            <?= $form->field($model, 'email') ?>

            <p>Se pretender Mudar a palavra-passe carregue no botão mudar palavra passe:</p>



            <div class="form-group">
                <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Atualizar Palavra Passe',['user/updatepassword'],['class'=>'btn btn-danger'])?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
