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

	<!-- End Customer Reviews -->