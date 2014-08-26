<?php
echo $this->Session->flash();
?>
<?php
	echo $this->Html->link(
		'Agregar Pago',
		array('controller' => 'pays', 'action' => 'add'),
		array('class' => 'button')
	);
?>
<br />
<br />
<table>
	<tr>
		<th>Nombre</th>
		<th>Rut</th>
		<th>Fecha</th>
		<th>Monto</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<?php
	foreach($pays as $pay){ ?>
		<tr>
			<td>
				<?php
				echo $this->Html->link(
					$pay['Person']['name'],
					array('controller' => 'people', 'action' => 'view', $pay['Person']['id'])
				);
				?>
			</td>
			<td>
				<?php echo $pay['Person']['rut']; ?>
			</td>
			<td>
				<?php echo $pay['Pay']['date']; ?>
			</td>
			<td>
				<?php echo $pay['Pay']['amount']; ?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Editar',
					array('controller' => 'people', 'action' => 'add', $pay['Pay']['id']),
					array('class' => 'button')
				);
				?>
			</td>
			<td>
				<?php
				/*echo $this->Html->link(
					'Eliminar',
					array('controller' => 'pay', 'action' => 'delete', $pay['Pay']['id']),
					array('class' => 'button')
				);*/
				?>
			</td>
		</tr>
		<?php
	}
?>
</table>
