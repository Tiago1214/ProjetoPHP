<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Categoria $model */

$this->title = 'Criar Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
