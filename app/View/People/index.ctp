<?php
	echo $this->Html->link(
		'Agregar Persona',
		array('controller' => 'people', 'action' => 'add'),
		array('class' => 'btn btn-success pull-left')
	);
	echo $this->Html->link(
		'Listado de Deudores',
		array('controller' => 'people', 'action' => 'debtors'),
		array('class' => 'btn btn-danger pull-right')
	);
?>

<br />
<hr />

<div class="row">
	<?php echo $this->Form->create(null, array('url' => array('controller' => 'people', 'action' => 'index'))); ?>
	<div class="col-md-10 col-sm-9 col-xs-12">
		<?php
		echo $this->AutoComplete->input(
			'Person.name',
			array(
				'label' => false,
				'autocomplete' => 'off',
				'class' => 'form-control input-search',
				'placeholder' => 'Ingresa Nombre de la persona que buscas',
				'autoCompleteUrl' => $this->Html->url(
					array(
						'controller' => 'people',
						'action' => 'auto_complete',
					)
				),
				'autoCompleteRequestItem' => 'autoCompleteText',
			)
		);
		?>
	</div>
	<div class="col-md-2 col-sm-3 hidden-xs">
		<?php echo $this->Form->button('Buscar', array('type' => 'submit', 'id'=>'btn-submit', 'class'=>'btn btn-primary btn-block')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
<br />
<br />

<div class="table-responsive">
	<table class="table table-striped table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('Person.name', 'Nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('Person.rut', 'Rut'); ?></th>
		<th><?php echo $this->Paginator->sort('Person.email', 'Email'); ?></th>
		<th><?php echo $this->Paginator->sort('Person.debt', 'Saldo'); ?></th>
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
				<?php echo $this->Number->currency($person['Person']['debt'], 'CLP'); ?>
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
</div>
<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
