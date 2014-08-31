<h2 class="pull-left">Pagos</h2>
<?php
	echo $this->Html->link(
		'Agregar Pago',
		array('controller' => 'pays', 'action' => 'add'),
		array('class' => 'btn btn-success pull-right')
	);
?>
<br />
<br />

<div class="table-responsive">
	<table class="table table-striped table-hover">
		<tr>
			<th><?php echo $this->Paginator->sort('Person.name', 'Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('Person.rut', 'Rut'); ?></th>
			<th><?php echo $this->Paginator->sort('Pay.date', 'Fecha Pago'); ?></th>
			<th><?php echo $this->Paginator->sort('Pay.amount', 'Monto Pagado'); ?></th>
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
					<?php echo $this->Time->nice($pay['Pay']['date']); ?>
				</td>
				<td>
					<?php echo $this->Number->currency($pay['Pay']['amount'], 'CLP'); ?>
				</td>
				<td>
					<?php
					echo $this->Html->link(
						'Editar',
						array('controller' => 'people', 'action' => 'add', $pay['Pay']['id']),
						array('class' => '')
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
</div>
<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
