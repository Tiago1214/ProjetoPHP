	<?php
    use yii\helpers\Html;
    use yii\bootstrap5\Carousel;
    ?>

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
                        <h1 style="font-weight: bold">Menu</h1>
						<p>Na secção abaixo mostramos os nossos artigos e o respetivo preço dos mesmos.</p>
					</div>
				</div>
			</div>

			<div class="row inner-menu-box">

				<div class="col-12">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <?php foreach($categorias as $categoria){
                                if($categoria->estado==1){
                                    ?>
                                    <h3 style="text-align: left;font-weight: bold"><?=$categoria->nome ?></h3>
                                    <h4><?=$categoria->descricao?></h4>
                            <?php
                                }?>


							<div class="row">
                                <?php foreach($artigos as $artigo){
                                    if($artigo->categoria_id==$categoria->id&&$artigo->categoria->estado==1&&$artigo->estado==1){
                                        ?>
                                        <div class="col-lg-4 col-md-6 special-grid drinks">
                                            <div class="gallery-single fix">
                                                <img src="<?= $artigo->imagemurl ?>" alt=" " class="img-fluid"/>
                                                <div class="why-text">
                                                    <h4><?= $artigo->nome ?></h4>
                                                    <p><?= $artigo->descricao ?></p>
                                                    <h5><?= $artigo->preco ?>€</h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                }} ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Comentários</h2>
						<p>Dê a sua opinião sobre os nossos serviços</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">




                            <?php foreach($comentarios as $comentario){ ?>
                            <?php foreach ($profiles as $profile){

                                if($profile->id==$comentario->profile_id){
                                    for($i = 0; $i <= 1; $i++) {
                                        ?>
                                        <div class="carousel-item text-center active">
                                        <div class="img-box p-1 border rounded-circle m-auto">
                                            <img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
                                        </div>
                                        <h6 class="mt-4 mb-0"><strong class="text-warning text-uppercase"> <?= $profile->user->username ?> </strong></h6>
                                        <h6 class="text-dark m-0">                                     <?= $comentario->titulo ?>          </h6>
                                        <p class="m-0 pt-3">                                          <?= $comentario->descricao ?>        </p>
                                        </div>

                                    <?php }}
                                    ?>
                                <?php } ?>
                                <?php
                             } ?>

                            <?= Carousel::widget([
                                'items' => $comentario,
                                'options' => ['class' => 'carousel slide', 'data-interval' => '5000'],
                                'clientOptions' => ['pause' => 'hover']
                            ]) ?>

							<!--
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
								<h6 class="text-dark m-0">Web Designer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
								<h6 class="text-dark m-0">Seo Analyst</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>

							-->

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