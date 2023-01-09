<?php
$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-4 col-sm-4 col-md-6">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Clientes',
                'number' =>\common\models\AuthAssignment::find()->where
                (['item_name' => 'Cliente'])->innerJoin
                ('user', 'auth_assignment.user_id = user.id')
                    ->andWhere('status ='. \common\models\User::STATUS_ACTIVE)->count(),
                'icon' => 'fas fa-thumbs-up',
            ]) ?>
        </div>
        <div class="col-4 col-sm-4 col-md-6">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Funcionários',
                'number' =>\common\models\AuthAssignment::find()->where
                (['item_name' => 'Funcionário'])->innerJoin
                ('user', 'auth_assignment.user_id = user.id')
                    ->andWhere('status ='. \common\models\User::STATUS_ACTIVE)->count(),
                'icon' => 'fas fa-thumbs-up',
            ]) ?>
        </div>
        <div class="col-4 col-sm-4 col-md-6">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Admins',
                'number' =>\common\models\AuthAssignment::find()->where
                (['item_name' => 'Admin'])->innerJoin
                ('user', 'auth_assignment.user_id = user.id')
                    ->andWhere('status ='. \common\models\User::STATUS_ACTIVE)->count(),
                'icon' => 'fas fa-thumbs-up',
            ]) ?>
        </div>
        <div class="col-md-6 col-sm-4 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Número de Comentários',
                'number' => \common\models\Comentario::find()->count(),
                'icon' => 'far fa-envelope',
            ]) ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Número de Reservas',
                'number' => \common\models\Reserva::find()->count(),
                'icon' => 'far fa-envelope',
            ]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Número de Artigos',
                'text' => \common\models\Artigo::find()->count(),
                'icon' => 'fas fa-shopping-cart',
            ]) ?>
        </div>
    </div>
</div>