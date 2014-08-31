<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Kiosko eClass</a>
		</div>
		<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo $this->Html->url(array('controller' => 'kiosko', 'action' => 'dashboard')); ?>"><span class="glyphicon glyphicon-dashboard"></span> Portada</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configuraciones</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Mis Datos</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
			</ul>
			<form class="navbar-form navbar-right">
				<input type="text" class="form-control" placeholder="Buscar...">
			</form>
		</div>
	</div>
</div>
