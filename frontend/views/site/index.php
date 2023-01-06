<?php
use yii\helpers\Url;
use yii\bootstrap5\Html; ?>
<div id="slides" class="cover-slides">
    <ul class="slides-container">
        <li class="text-left">
            <?= Html::img('@web/images/slider-01.jpg') ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bem Vindo ao <br> 100% Português</strong></h1>
                        <p class="m-b-40">Experimente os nossos Artigos</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= Url::to('../site/menu')?>">Ver Menu</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-left">
            <?= Html::img('@web/images/slider-02.jpg') ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bem Vindo ao <br> 100% Português</strong></h1>
                        <p class="m-b-40">Experimente os nossos Artigos</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= Url::to('../site/menu')?>">Ver Menu</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-left">
            <?= Html::img('@web/images/slider-03.jpg') ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bem Vindo ao <br> 100% Português</strong></h1>
                        <p class="m-b-40">Experimente os nossos Artigos</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= Url::to('../site/menu')?>">Ver Menu</a></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End slides -->

<!-- Start About -->
<div class="about-section-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 text-center"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                <div class="inner-column">
                    <h1>Bem Vindo ao <span> 100% Português</span></h1>
                    <h4>Pequena História</h4>
                    <p>Desde o nosso modesto começo, em 2005, com um pequeno espaço na elegante cidade de Leiria, o desenvolvimento da 100% Português
                        foi animado com a energia para cozinhar e servir comida apenas portuguêsa. Em contraste com outros restaurantes, o 100% Português
                        foi feito com a experiência de apenas pessoas portuguesas que fazem com que todos os pratos sejam únicos. Sabemos que muitas pessoas
                        adoram comida portuguêsa, e que nem todos tem a essencia que tornam a comida portuguêsa comum tão saborosa, assim, o 100% Português
                        tem como principal objetivo dar a conhecer os tipicos pratos portugueses.</p>
                    <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Sobre Nós</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About -->

<!-- Start QT -->
<div class="qt-box qt-background">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <p class="lead ">
                    " Se você não é o único a cozinhar, fique fora do caminho e elogie o chef. "
                </p>
                <span class="lead">Michael Strahan</span>
            </div>
        </div>
    </div>
</div>
<!-- End QT -->
<!-- Start Gallery -->
<div class="gallery-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Galeria</h2>
                    <p>Tenha uma melhor noção dos nossos pratos atravéz da nossa galeria de fotos!</p>
                </div>
            </div>
        </div>
        <div class="tz-gallery">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox">
                        <?= Html::img('@web/images/gallery-img-01.jpg',['class'=>'img-fluid','alt'=>'Gallery Images']) ?>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox">
                        <?= Html::img('@web/images/gallery-img-02.jpg',['class'=>'img-fluid','alt'=>'Gallery Images']) ?>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox">
                        <?= Html::img('@web/images/gallery-img-03.jpg',['class'=>'img-fluid','alt'=>'Gallery Images']) ?>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox">
                        <?= Html::img('@web/images/gallery-img-04.jpg',['class'=>'img-fluid','alt'=>'Gallery Images']) ?>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox">
                        <?= Html::img('@web/images/gallery-img-05.jpg',['class'=>'img-fluid','alt'=>'Gallery Images']) ?>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox">
                        <?= Html::img('@web/images/gallery-img-06.jpg',['class'=>'img-fluid','alt'=>'Gallery Images']) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery -->

<!-- Start Customer Reviews -->
<div class="customer-reviews-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Comentários</h2>
                    <p>Veja a opinião dos nossos clientes</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto text-center">
                <div id="reviews" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner mt-4">
                        <div class="carousel-item text-center active">
                            <?php foreach($comentarios as $comentario){
                                if($comentario==1){
                                    ?>
                                    <div class="img-box p-1 border rounded-circle m-auto">
                                        <?= Html::img('@web/images/quotations-button.png',['class'=>'d-block w-100 rounded-circle']) ?>
                                    </div>
                                    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase"><?= $comentario->profile->user->username ?></strong></h5>
                                    <h6 class="text-dark m-0"><?= $comentario->titulo ?></h6>
                                    <p class="m-0 pt-3"><?php $comentario->descricao ?></p>
                                    <?php
                                }
                                ?>
                                <?php
                            } ?>
                        </div>
                    </div>
                    <div class="carousel-inner mt-4">
                        <div class="carousel-item text-center active">
                            <?php foreach($comentarios as $comentario){
                                if($comentario==1){
                                    ?>
                                    <div class="img-box p-1 border rounded-circle m-auto">
                                        <?= Html::img('@web/images/quotations-button.png',['class'=>'d-block w-100 rounded-circle']) ?>
                                    </div>
                                    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase"><?= $comentario->profile->user->username ?></strong></h5>
                                    <h6 class="text-dark m-0"><?= $comentario->titulo ?></h6>
                                    <p class="m-0 pt-3"><?php $comentario->descricao ?></p>
                                    <?php
                                }
                                ?>
                                <?php
                            } ?>
                        </div>
                    </div>
                    <div class="carousel-inner mt-4">
                        <div class="carousel-item text-center active">
                            <?php foreach($comentarios as $comentario){
                                if($comentario==1){
                                    ?>
                                    <div class="img-box p-1 border rounded-circle m-auto">
                                        <?= Html::img('@web/images/quotations-button.png',['class'=>'d-block w-100 rounded-circle']) ?>
                                    </div>
                                    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase"><?= $comentario->profile->user->username ?></strong></h5>
                                    <h6 class="text-dark m-0"><?= $comentario->titulo ?></h6>
                                    <p class="m-0 pt-3"><?php $comentario->descricao ?></p>
                                    <?php
                                }
                                ?>
                                <?php
                            } ?>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Customer Reviews -->



