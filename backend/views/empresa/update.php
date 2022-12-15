<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Empresa $model */

$this->title = 'Update Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresa-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
