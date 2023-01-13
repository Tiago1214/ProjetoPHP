<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
?>
<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../site/index">
            <?= Html::img('@web/images/100_portugues_logo.png') ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active"><a class="nav-link" href="<?= Url::to('/site/index'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to('/site/menu'); ?>">Menu</a></li>
                    <?php if(Yii::$app->user->identity!=null){
                        ?>
                        <li class="nav-item"><a class="nav-link" href="<?= Url::to('/pedido/index');?>">Pedidos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Url::to('/reserva/index');?>">Reservas</a></li>
                    <?php
                    } ?>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to('/comentario/index');?>">Comentários</a></li>
                    <?php if(Yii::$app->user->identity!=null){
                        ?>
                        <li class="nav-item"><a class="nav-link" href="<?= Url::to('/comentario/meuscomentarios');?>">Meus Comentários</a></li>
                    <?php
                    }?>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to('/site/about'); ?>">Sobre Nós</a></li>
              

                    <?php if(Yii::$app->user->isGuest){
                        ?>
                        <li class="nav-item"><a class="nav-link" href="<?= Url::to('/site/signup'); ?>">Criar Conta</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= Url::to('/site/login'); ?>">Login</a></li>
                    <?php
                    }else{
                        ?>
                        <li class="nav-item">
                            <?= Html::a('<i class="fas fa-sign-out-alt">Logout  </i>'. ' ('.Yii::$app->user->identity->username.')', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                        </li>
                    <?php
                    } ?>

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
