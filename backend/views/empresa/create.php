<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Empresa $model */

$this->title = 'Create Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
