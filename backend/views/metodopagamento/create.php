<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\MetodoPagamento $model */

$this->title = 'Criar Método Pagamento';
$this->params['breadcrumbs'][] = ['label' => 'Metodo Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodo-pagamento-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
