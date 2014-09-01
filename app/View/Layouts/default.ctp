<!DOCTYPE html>
<html lang="es">
	<head>
		<?php echo $this->Html->charset(); ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php echo $this->Html->meta('icon'); ?>
		<title><?php echo __('Sistema'); ?></title>

		<?php echo $this->Html->css('/vendors/bootstrap/dist/css/bootstrap.min'); ?>
		<?php echo $this->Html->css('/vendors/font-awesome/css/font-awesome.min'); ?>
		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->fetch('meta'); ?>
		<?php echo $this->fetch('css'); ?>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php echo $this->Html->script('/vendors/jquery/dist/jquery.min'); ?>
	</head>
	<body>
		<div class="container">
			<?php echo $this->element('navbar'); ?>
			<div class="container-fluid">
				<div class="row">
					<?php echo $this->element('sidebar'); ?>

					<div class="col-xs-11 col-xs-offset-1 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
			</div>
		</div> <!-- /container -->

		<?php echo $this->element('sql_dump'); ?>
		<?php echo $this->Html->script('/vendors/bootstrap/dist/js/bootstrap.min'); ?>
		<?php echo $this->Html->script('views/helpers/auto_complete'); ?>
		<?php echo $this->fetch('script'); ?>
	</body>
</html>
