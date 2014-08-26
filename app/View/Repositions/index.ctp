<?php
pr($repositions);
echo $this->Session->flash();
?>
<?php
	echo $this->Html->link(
		'Agregar Reposición',
		array('controller' => 'repositions', 'action' => 'add'),
		array('class' => 'button')
	);
?>
<br />
<br />
<table>
	<tr>
		<th>Repositiono</th>
		<th>Fecha</th>
		<th>Cantidad</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<?php
	foreach($repositions as $reposition){ ?>
		<tr>
			<td>
				<?php
				echo $this->Html->link(
					$reposition['Product']['name'],
					array('controller' => 'products', 'action' => 'view', $reposition['Product']['id'])
				);
				?>
			</td>
			<td>
				<?php echo $reposition['Reposition']['date']; ?>
			</td>
			<td>
				<?php echo $reposition['Reposition']['cantity']; ?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Editar',
					array('controller' => 'repositions', 'action' => 'add', $reposition['Reposition']['id']),
					array('class' => 'button')
				);
				?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Eliminar',
					array('controller' => 'repositions', 'action' => 'delete', $reposition['Reposition']['id']),
					array('class' => 'button')
				);
				?>
			</td>
		</tr>
		<?php
	}
?>
</table>
