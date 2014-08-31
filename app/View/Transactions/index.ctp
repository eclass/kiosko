<h2>Últimas compras</h2>
<div class="table-responsive">
	<table class="table table-striped table-hover">
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
					<?php echo $this->Time->nice($transaction['Transaction']['date']); ?>
				</td>
				<td>
					<?php echo $this->Number->currency($transaction['Transaction']['total'], 'CLP'); ?>
				</td>
				<td>
					<?php
					echo $this->Html->link(
						'Detalle',
						array('controller' => 'transactions', 'action' => 'view', $transaction['Transaction']['id']),
						array('class' => '')
					);
					?>
				</td>
			</tr>
			<?php
		}
	?>
	</table>
</div>
<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
