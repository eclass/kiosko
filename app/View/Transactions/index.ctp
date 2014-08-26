<?php
echo $this->Session->flash();
?>
<br />
<br />
<table>
	<tr>
		<th>Nombre</th>
		<th>Rut</th>
		<th>Fecha</th>
		<th>Total</th>
		<th>Ver Detalle</th>
	</tr>
	<?php
	foreach($transactions as $transaction){ ?>
		<tr>
			<td>
				<?php
				echo $this->Html->link(
					$transaction['Person']['name'],
					array('controller' => 'people', 'action' => 'view', $transaction['Person']['id'])
				);
				?>
			</td>
			<td>
				<?php echo $transaction['Person']['rut']; ?>
			</td>
			<td>
				<?php echo $transaction['Transaction']['date']; ?>
			</td>
			<td>
				<?php echo $transaction['Transaction']['total']; ?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Detalle',
					array('controller' => 'transactions', 'action' => 'view', $transaction['Transaction']['id']),
					array('class' => 'button')
				);
				?>
			</td>
		</tr>
		<?php
	}
?>
</table>
