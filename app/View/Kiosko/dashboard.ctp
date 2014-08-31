<div class="row">
	<div class="col-lg-4 col-md-6 col-ms-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body mini-box">
				<span class="btn-icon btn-icon-round btn-icon-lg-alt bg-warning">
                	<span class="fa fa-usd"></span>
            	</span>
            	<div class="box-info">
					<h2>$ 57.000</h2>
					<p>Adeudado</p>
            	</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-ms-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body mini-box">
				<span class="btn-icon btn-icon-round btn-icon-lg-alt bg-danger">
                	<span class="fa fa-users"></span>
            	</span>
            	<div class="box-info">
					<h2>14</h2>
					<p>Deudores</p>
            	</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-ms-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body mini-box">
				<span class="btn-icon btn-icon-round btn-icon-lg-alt bg-success">
                	<span class="fa fa-line-chart"></span>
            	</span>
            	<div class="box-info">
					<h2>57</h2>
					<p>Ventas</p>
            	</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-ms-12 col-cs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Agregar Pago</div>
			<div class="panel-body">
				<?php
				echo $this->Form->create('Pay', array(
					'url' => array('controller' => 'pays', 'action' => 'add'),
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'class' => 'well'
				));
				echo $this->Form->input('amount', array(
					'label' => 'Monto',
					'beforeInput' => '<div class="input-group"><span class="input-group-addon">$</span>',
					'afterInput' => '</div>'
				));
				echo $this->Form->input('Pay.Person.rut', array('label' => 'Rut Persona', 'type' => 'text'));
					echo $this->Form->submit('Guardar', array(
						'div' => 'form-group',
						'class' => 'btn btn-default'
					));
				echo $this->Form->end();
				?>

			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-ms-12 col-cs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Agregar Reposición</div>
			<div class="panel-body">
				<?php
				echo $this->Form->create('Reposition', array(
					'url' => array('controller' => 'repositions', 'action' => 'add'),
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control'
					),
					'class' => 'well'
				));
				echo $this->Form->input('cantity', array('label' => 'Cantidad'));
				echo $this->Form->input('Reposition.Product.code', array(
					'label' => 'Código Producto',
					'beforeInput' => '<div class="input-group"><span class="input-group-addon"><span class="fa fa-barcode"></span></span>',
					'afterInput' => '</div>'
				));
				echo $this->Form->submit('Guardar', array(
					'div' => 'form-group',
					'class' => 'btn btn-default'
				));
				echo $this->Form->end();
				?>
			</div>
		</div>
	</div>
</div>
