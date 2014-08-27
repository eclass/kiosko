<?php
echo $this->Session->flash();
?>
<?php
	echo $this->Html->link(
		'Crear Persona',
		array('controller' => 'people', 'action' => 'add'),
		array('class' => 'button')
	);
?>
<br />
<?php
	echo $this->Html->link(
		'Listado de Deudores',
		array('controller' => 'people', 'action' => 'debtors'),
		array('class' => 'button')
	);
?>
<br />
<br />
<table>
	<tr>
		<th>Nombre</th>
		<th>Rut</th>
		<th>Email</th>
		<th>Saldo</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<?php
	foreach($people as $person){ ?>
		<tr>
			<td>
				<?php
				echo $this->Html->link(
					$person['Person']['name'],
					array('controller' => 'people', 'action' => 'view', $person['Person']['id'])
				);
				?>
			</td>
			<td>
				<?php echo $person['Person']['rut']; ?>
			</td>
			<td>
				<?php echo $person['Person']['email']; ?>
			</td>
			<td>
				<?php echo $person['Person']['debt']; ?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Editar',
					array('controller' => 'people', 'action' => 'add', $person['Person']['id']),
					array('class' => 'button')
				);
				?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Eliminar',
					array('controller' => 'people', 'action' => 'delete', $person['Person']['id']),
					array('class' => 'button') ,
					"La acción eliminará la persona, ¿Está seguro?"
				);
				?>
			</td>
		</tr>
		<?php
	}
?>
</table>
