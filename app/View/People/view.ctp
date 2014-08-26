<h2><?php echo $person['Person']['name']?></h2>
<?php
echo $this->Html->link(
	'Editar',
	array('controller' => 'people', 'action' => 'add', $person['Person']['id']),
	array('class' => 'button', 'style' => 'float: right')
);
?>
<table>
	<tr>
		<td>Rut</td>
		<td><?php echo $person['Person']['rut']?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $person['Person']['email']?></td>
	</tr>
	<tr>
		<td>Deuda</td>
		<td><?php echo $person['Person']['debt']?></td>
	</tr>
</table>

<h2>Últimos pagos</h2>
<?php
echo $this->Html->link(
	'Agregar Pago',
	array('controller' => 'pays', 'action' => 'add', 0, $person['Person']['id']),
	array('class' => 'button', 'style' => 'float: right')
);
?>
<?php
if(!empty($person['Pay'])){ ?>
	<table>
		<tr>
			<th>Fecha</th>
			<th>Monto</th>
		</tr>
		<?php
		foreach($person['Pay'] as $pay){ ?>
			<tr>
				<td><?php echo $pay['date']; ?></td>
				<td><?php echo $pay['amount']; ?></td>
			</tr>
		<?php
		}
		?>
	</table>
<?php
}
else{
	echo '<p>Sin pagos realizados</p>';
}
?>
<h2>Últimas compras</h2>
<?php
if(!empty($person['Transaction'])){ ?>
	<table>
		<tr>
			<th>Fecha</th>
			<th>Total</th>
		</tr>
		<?php
		foreach($person['Transaction'] as $transaction){ ?>
			<tr>
				<td><?php echo $transaction['date']; ?></td>
				<td><?php echo $transaction['total']; ?></td>
			</tr>
		<?php
		}
		?>
	</table>
<?php
}
else{
	echo '<p>Sin compras realizadas</p>';
}
?>
