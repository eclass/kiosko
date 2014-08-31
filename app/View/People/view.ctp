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
if(!empty($person['Pay'])){ ?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<tr>
				<th>Fecha</th>
				<th>Monto</th>
			</tr>
			<?php
			foreach($person['Pay'] as $pay){ ?>
				<tr>
					<td><?php echo $this->Time->nice($pay['date']); ?></td>
					<td><?php echo $this->Number->currency($pay['amount'], 'CLP'); ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php
}
else{
	echo '<p>Sin pagos realizados</p>';
}
?>

<hr />
<h2>Últimas compras</h2>
<?php
if(!empty($person['Transaction'])){ ?>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<tr>
				<th>Fecha</th>
				<th>Total</th>
			</tr>
			<?php
			foreach($person['Transaction'] as $transaction){ ?>
				<tr>
					<td><?php echo $this->Time->nice($transaction['date']); ?></td>
					<td><?php echo $this->Number->currency($transaction['total']); ?></td>
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
