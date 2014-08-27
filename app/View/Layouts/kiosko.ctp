<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title_for_layout; ?></title>

		<link rel="stylesheet" href="<?php echo Router::url('/', true); ?>vendors/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo Router::url('/', true); ?>vendors/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo Router::url('/', true); ?>css/app.css">

		<script src="<?php echo Router::url('/', true); ?>vendors/jquery/dist/jquery.min.js"></script>
		<script src="<?php echo Router::url('/', true); ?>js/app.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="logo text-center">
						<img src="<?php $this->Html->image('logo.png'); ?>" alt="">
					</div>
				</div>
			</div>

			<section id="home" class="row home">
				<input type="text" id="passport" placeholder="RUT">
			</section>

			<section id="cart">
				<div class="list">
					<input type="text" id="product_code">
					<p class="nombre text-left">Bienvenido <span></span></p>
					<div class="empty-list">
						<h2>Acerca el producto al lector</h2>
						<i class="fa fa-barcode"></i>
					</div>

					<div class="products to-show">
						<div class="row title">
							<div class="col-sm-6 text-left">Nombre</div>
							<div class="col-sm-1">#</div>
							<div class="col-sm-2">Precio</div>
							<div class="col-sm-3">Sub-Total</div>
							<!-- <div class="col-sm-1"></div> -->
						</div>

						<!--<div class="row">
							<div class="col-sm-8 text-left">Papas Fritas 50gr.</div>
							<div class="col-sm-1">1</div>
							<div class="col-sm-2">$ 300</div>
							<div class="col-sm-1"><a href="#"> <i class="fa fa-minus-square"></i></a></div>
						</div>-->
					</div>

					<div class="totals to-show">
						<div class="row">
							<div class="col-sm-offset-7 col-sm-1"><b>Total: </b></div>
							<div class="col-sm-4" data-kiosko="total">$0</div>
						</div>
					</div>

					<div class="row to-show">
						<div class="keyboards col-sm-7">
							<div class="row">
								<div class="col-sm-6">
									<a href="javascript:;" class="btn btn-success confirmar">Barra Espaciadora</a>
								</div>
								<div class="col-sm-6">
									Confirmar Compra
								</div>
							</div>
							<!--<div class="row">
								<div class="col-sm-6">
									<span class="label label-info">Enter</span>
								</div>
								<div class="col-sm-6">
									Agregar otro Producto
								</div>
							</div>-->
							<div class="row">
								<div class="col-sm-6">
									<a href="javascript:;" class="btn btn-warning eliminar">Backspace</a>
								</div>
								<div class="col-sm-6">
									Eliminar producto
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<a href="javascript:;" class="btn btn-danger cancelar">Escape</a>
								</div>
								<div class="col-sm-6">
									Cancelar Compra
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>
