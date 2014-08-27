<?php
echo $this->Session->flash();
?>
<?php
	echo $this->Html->link(
		'Listado de Personas',
		array('controller' => 'people', 'action' => 'index'),
		array('class' => 'button')
	);
?>
<br />
<br />
<table>
	<tr>
		<th>Nombre</th>
		<th>Deuda</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($debtors as $debtor) : ?>
		<tr>
			<td>
				<?php echo $this->Html->link(
					$debtor['Person']['name'],
					array('controller' => 'people', 'action' => 'view', $debtor['Person']['id'])
				); ?>
			</td>
			<td><?php echo $debtor['Person']['debt'] ?></td>
			<td>
				<?php
					echo $this->Html->link(
						'Pagar Deuda',
						array('controller' => 'pays', 'action' => 'add', 0, $debtor['Person']['id']),
						array('class' => 'button')
					);
				?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
