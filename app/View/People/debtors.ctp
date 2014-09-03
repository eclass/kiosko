<h2 class="pull-left">Buscar Deudor</h2>
<?php
	echo $this->Html->link(
		'Personas',
		array('controller' => 'people', 'action' => 'index'),
		array('class' => 'btn btn-success pull-right')
	);
?>

<br /><br />
<hr />

<div class="row">
	<?php echo $this->Form->create(null, array('url' => array('controller' => 'people', 'action' => 'debtors'))); ?>
	<div class="col-md-10 col-sm-9 col-xs-12">
		<?php
		echo $this->AutoComplete->input(
			'Person.name',
			array(
				'label' => false,
				'autocomplete' => 'off',
				'class' => 'form-control input-search',
				'placeholder' => 'Ingresa Nombre o Rut de la persona que buscas',
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
		<?php echo $this->Form->button('Buscar', array('type' => 'submit', 'id' => 'btn-submit', 'class' => 'btn btn-primary btn-block')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
<br />
<br />

<?php echo $this->Form->button('Pagar Total Deuda', array('type' => 'button', 'id' => 'pay-debts', 'class' => 'btn btn-primary')); ?>
<br />
<br />
<div class="table-responsive">
	<table class="table table-striped table-hover">
	<tr>
		<th><?php echo $this->Form->checkbox('', array('class' => 'debtor-all-checks')); ?></th>
		<th><?php echo $this->Paginator->sort('Person.name', 'Nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('Person.rut', 'Rut'); ?></th>
		<th><?php echo $this->Paginator->sort('Person.debt', 'Deuda'); ?></th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($debtors as $debtor) : ?>
		<tr>
			<td><?php echo $this->Form->checkbox('Person.' . $debtor['Person']['id'], array('value' => $debtor['Person']['id'], 'class' => 'debtor-check')); ?></td>
			<td>
				<?php echo $this->Html->link(
					$debtor['Person']['name'],
					array('controller' => 'people', 'action' => 'view', $debtor['Person']['id'])
				); ?>
			</td>
			<td><?php echo $debtor['Person']['rut'] ?></td>
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
</div>
<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>

<script>
$(document).ready(function() {
	$('input:checkbox.debtor-all-checks').on('click', function() {
		$('input:checkbox.debtor-check').trigger("click");
	});

    $('#pay-debts').on('click', function(){
    	var id_person = [];

    	$('input:checkbox.debtor-check').each(function () {
    		if (this.checked) {
    			id_person.push(this.value);
    		}
    	});

    	if (id_person.length === 0) {
    		alert('Debes seleccionar al menos un usuario para pagar su deuda.');
    	}
    	else {
	    	$.ajax({
	    		url: '<?php echo $this->Html->url(array('controller' => 'pays', 'action' => 'pay_debts')); ?>',
	    		data: {
	    			id_person: id_person
	    		},
	    		method: 'post',
	    		dataType: 'html',
	    		success: function(msg) {
	    			$('#content').prepend(msg);
					setTimeout(function() {
						location.href = '<?php echo $this->Html->url(array('controller' => 'pays', 'action' => 'debtors')); ?>';
					}, 3000);
	    		}
	    	});
    	}

    });
});
</script>
