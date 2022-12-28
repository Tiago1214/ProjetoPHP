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
                        <p class="m-b-40">Experimente os nossos Menus</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= Url::to('../site/menu')?>">Ver Menus</a></p>
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
                        <p class="m-b-40">Experimente os nossos Menus</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= Url::to('../site/menu')?>">Ver Menus</a></p>
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
                        <p class="m-b-40">Experimente os nossos Menus</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= Url::to('../site/menu')?>">Ver Menus</a></p>
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

<!-- Start Menu -->
<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Menu</h2>
                    <p>Veja os Nossos Melhores Menus</p>
                </div>
            </div>
        </div>

        <div class="row inner-menu-box">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Tudo</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Bebidas</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Comida</</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Sobremesas</a>
                </div>
            </div>

            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="gallery-single fix">
                                    <img src="images/img-01.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Drinks 1</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $7.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="gallery-single fix">
                                    <img src="images/img-02.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Drinks 2</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $9.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="gallery-single fix">
                                    <img src="images/img-03.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Drinks 3</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $10.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid lunch">
                                <div class="gallery-single fix">
                                    <img src="images/img-04.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Lunch 1</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $15.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid lunch">
                                <div class="gallery-single fix">
                                    <img src="images/img-05.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Lunch 2</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $18.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid lunch">
                                <div class="gallery-single fix">
                                    <img src="images/img-06.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Lunch 3</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $20.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid dinner">
                                <div class="gallery-single fix">
                                    <img src="images/img-07.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Dinner 1</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $25.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid dinner">
                                <div class="gallery-single fix">
                                    <img src="images/img-08.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Dinner 2</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $22.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid dinner">
                                <div class="gallery-single fix">
                                    <img src="images/img-09.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Dinner 3</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $24.79</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="gallery-single fix">
                                    <img src="images/img-01.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Drinks 1</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $7.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="gallery-single fix">
                                    <img src="images/img-02.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Drinks 2</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $9.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid drinks">
                                <div class="gallery-single fix">
                                    <img src="images/img-03.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Drinks 3</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $10.79</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 special-grid lunch">
                                <div class="gallery-single fix">
                                    <img src="images/img-04.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Lunch 1</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $15.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid lunch">
                                <div class="gallery-single fix">
                                    <img src="images/img-05.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Lunch 2</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $18.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid lunch">
                                <div class="gallery-single fix">
                                    <img src="images/img-06.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Lunch 3</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $20.79</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 special-grid dinner">
                                <div class="gallery-single fix">
                                    <img src="images/img-07.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Dinner 1</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $25.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid dinner">
                                <div class="gallery-single fix">
                                    <img src="images/img-08.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Dinner 2</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $22.79</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 special-grid dinner">
                                <div class="gallery-single fix">
                                    <img src="images/img-09.jpg" class="img-fluid" alt="Image">
                                    <div class="why-text">
                                        <h4>Special Dinner 3</h4>
                                        <p>Sed id magna vitae eros sagittis euismod.</p>
                                        <h5> $24.79</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Menu -->

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
                    <a class="lightbox" href="images/gallery-img-01.jpg">
                        <img class="img-fluid" src="images/gallery-img-01.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-02.jpg">
                        <img class="img-fluid" src="images/gallery-img-02.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-03.jpg">
                        <img class="img-fluid" src="images/gallery-img-03.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-04.jpg">
                        <img class="img-fluid" src="images/gallery-img-04.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-05.jpg">
                        <img class="img-fluid" src="images/gallery-img-05.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-06.jpg">
                        <img class="img-fluid" src="images/gallery-img-06.jpg" alt="Gallery Images">
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
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paulo Cardoso</strong></h5>
                            <h6 class="text-dark m-0">Engenheiro Informático</h6>
                            <p class="m-0 pt-3">De facto uma refeição surpreendente. Não é o melhor restaurante do mundo mas
                                não está tão atrás dos melhores com certeza. Não bebo vinho mas possui uma ementa completa.</p>
                        </div>
                        <div class="carousel-item text-center">
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">João Filipe</strong></h5>
                            <h6 class="text-dark m-0">Advogado</h6>
                            <p class="m-0 pt-3">Excepcional do início ao fim. Esta é a segunda visita a este restaurante. Tudo perfeito:
                                atendimento caloroso , uma refeição perfeita e um chef que tem prazer em receber os clientes. Parabéns!</p>
                        </div>
                        <div class="carousel-item text-center">
                            <div class="img-box p-1 border rounded-circle m-auto">
                                <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                            </div>
                            <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Margarida Correia </strong></h5>
                            <h6 class="text-dark m-0">Analista</h6>
                            <p class="m-0 pt-3"> Fomos jantar no restaurante e tivemos uma bela experiencia gastronômica, apesar do preço,
                                exagerado. Garçons e maître extremamente atenciosos e eficientes. O restaurante em si é lindo,
                                com as mesas tendo privacidade e jardins muito bonitos </p>
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



