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
                    <li class="nav-item active"><a class="nav-link" href="<?= Url::to('../site/index'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to('../site/menu'); ?>">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Takeaway</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Reservas</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="reservation.php">Marcar Reserva</a>
                            <a class="dropdown-item" href="stuff.php">Visualizar Reservas</a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="<?= Url::to('/site/about'); ?>">Sobre Nós</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= Url::to('/site/contact'); ?>">Contactos</a></li>

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
