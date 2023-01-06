<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Artigo $model */

$this->title = 'Atualizar Artigo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Artigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'categoria_id' => $model->categoria_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artigo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'iva'=>$iva,'categoria'=>$categoria,
    ]) ?>

</div>
