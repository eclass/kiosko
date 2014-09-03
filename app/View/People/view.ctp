<h2 class="pull-left"><?php echo $person['Person']['name']?></h2>
<?php
echo $this->Html->link(
	'Editar Persona',
	array('controller' => 'people', 'action' => 'add', $person['Person']['id']),
	array('class' => 'btn btn-success pull-right')
);
$debtClass = ($person['Person']['debt'] > 0 ? 'danger' : '');
?>
<table class="table table-bordered table-hover">
	<tr>
		<td>Rut</td>
		<td><?php echo $person['Person']['rut']?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $person['Person']['email']?></td>
	</tr>
	<tr class="<?php echo $debtClass; ?>">
		<td>Deuda</td>
		<td><?php echo $this->Number->currency($person['Person']['debt'], 'CLP');?></td>
	</tr>
</table>


<hr />
<h3 class="pull-left">Últimos pagos</h3>
<?php
echo $this->Html->link(
	'Agregar Pago',
	array('controller' => 'pays', 'action' => 'add', 0, $person['Person']['id']),
	array('class' => 'btn btn-success pull-right')
);
?>
<?php
if(!empty($pays)){ ?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<tr>
				<th>Fecha</th>
				<th>Monto</th>
			</tr>
			<?php
			foreach($pays as $pay){ ?>
				<tr>
					<td><?php echo $this->Time->nice($pay['Pay']['date']); ?></td>
					<td><?php echo $this->Number->currency($pay['Pay']['amount'], 'CLP'); ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php
}
else{
	echo '<div style="clear:both"></div><p>Sin pagos realizados</p>';
}
?>

<hr />
<h2>Últimas compras</h2>
<?php
if(!empty($transactions)){ ?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<tr>
				<th>Producto</th>
				<th>Fecha</th>
				<th>Total</th>
			</tr>
			<?php
			foreach($transactions as $transaction){ ?>
				<tr>
					<td><?php echo $this->Html->link($transaction['Product']['name'], array('controller' => 'products', 'action' => 'view', $transaction['Product']['id'])); ?></td>
					<td><?php echo $this->Time->nice($transaction['Transaction']['date']); ?></td>
					<td><?php echo $this->Number->currency($transaction['Transaction']['total']); ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php
}
else{
	echo '<p>Sin compras realizadas</p>';
}
?>
