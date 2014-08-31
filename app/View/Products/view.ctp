<h2 class="pull-left"><?php echo $product['Product']['name']?></h2>
<?php
echo $this->Html->link(
	'Editar Producto',
	array('controller' => 'products', 'action' => 'add', $product['Product']['id']),
	array('class' => 'btn btn-success pull-right')
);
?>
<table class="table table-bordered table-hover">
	<tr>
		<td>Código</td>
		<td><?php echo $product['Product']['code']?></td>
	</tr>
	<tr>
		<td>Precio</td>
		<td><?php echo $this->Number->currency($product['Product']['price'], 'CLP'); ?></td>
	</tr>
	<tr>
		<td>Stock</td>
		<td><?php echo $product['Product']['stock']?></td>
	</tr>
	<tr>
		<td>Descripción</td>
		<td><?php echo $product['Product']['description']?></td>
	</tr>
</table>
<hr />
<h3 class="pull-left">Últimas reposiciones</h3>
<?php
echo $this->Html->link(
	'Agregar Reposición',
	array('controller' => 'repositions', 'action' => 'add', 0, $product['Product']['id']),
	array('class' => 'pull-right btn btn-success')
);

if(!empty($product['Reposition'])){ ?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<tr>
				<th>Fecha</th>
				<th>Cantidad</th>
			</tr>
			<?php
			foreach($product['Reposition'] as $reposition){ ?>
				<tr>
					<td><?php echo $this->Time->nice($reposition['date']); ?></td>
					<td><?php echo $reposition['cantity']; ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php
}
else{
	echo '<p>Sin reposiciones realizadas</p>';
}
