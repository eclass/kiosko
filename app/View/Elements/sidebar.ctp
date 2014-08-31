<div class="col-xs-1 col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li><a href="<?php echo $this->Html->url(array('controller' => 'kiosko', 'action' => 'dashboard')); ?>"><span class="fa fa-cube"></span> <span class="hidden-xs">Portada</span></a></li>
		<li><a href="<?php echo $this->Html->url(array('controller' => 'people', 'action' => 'debtors')); ?>" title="Deudores"><span class="fa fa-table"></span> <span class="hidden-xs">Lista Deudores</span></a></li>
		<li><a href="<?php echo $this->Html->url(array('controller' => 'pays', 'action' => 'index')); ?>"><span class="fa fa-credit-card"></span> <span class="hidden-xs">Pagos</span></a></li>
		<li><a href="<?php echo $this->Html->url(array('controller' => 'transactions', 'action' => 'index')); ?>"><span class="fa fa-dollar"></span> <span class="hidden-xs">Últimas Compras</span></a></li>
		<li><a href="<?php echo $this->Html->url(array('controller' => 'repositions', 'action' => 'index')); ?>"><span class="fa fa-truck"></span> <span class="hidden-xs">Reposiciones</span></a></li>
	</ul>
	<ul class="nav nav-sidebar">
		<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>"><span class="fa fa-cubes"></span> <span class="hidden-xs">Productos</span></a></li>
		<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'add')); ?>"><span class="fa fa-plus"></span> <span class="hidden-xs">Nuevo</span></a></li>
	</ul>
	<ul class="nav nav-sidebar">
		<li><a href="<?php echo $this->Html->url(array('controller' => 'people', 'action' => 'index')); ?>"><span class="fa fa-users"></span> <span class="hidden-xs">Personas</span></a></li>
		<li><a href="<?php echo $this->Html->url(array('controller' => 'people', 'action' => 'add')); ?>"><span class="fa fa-plus"></span> <span class="hidden-xs">Nuevo</span></a></li>
	</ul>
	<ul class="nav nav-sidebar">
		<li><a href="#"><span class="fa fa-map-marker"></span> <span class="hidden-xs">Oficinas</span></a></li>
	</ul>
</div>
