<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Artigo $model */

$this->title = 'Criar Artigo';
$this->params['breadcrumbs'][] = ['label' => 'Artigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artigo-create">


    <?= $this->render('_form', [
        'model' => $model,'iva'=>$iva,'categoria'=>$categoria
    ]) ?>

</div>
