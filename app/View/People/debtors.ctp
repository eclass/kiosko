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
<h2>Buscar Deudor</h2>
<?php
	echo $this->Form->create(null, array(
	    'url' => array('controller' => 'people', 'action' => 'debtors')
	));
	echo $this->AutoComplete->input(
				'Person.name',
				array(
					'label' => 'Nombre: ',
					'autocomplete'=>'off',
					'class'=>'form-control input-search',
					'placeholder'=>'Ingresa Nombre de la persona',
					'autoCompleteUrl'=>$this->Html->url(
						array(
							'controller'=>'people',
							'action'=>'auto_complete_debtors',
						)
					),
					'autoCompleteRequestItem'=>'autoCompleteText',
				)
			);
	echo $this->Form->button('Buscar', array('type' => 'submit', 'id'=>'btn-submit', 'class'=>'btn btn-primary'));
	echo $this->Form->end();
?>
<br />
<br />
<?php echo $this->Form->button('Pagar Total Deuda', array('type' => 'button', 'id'=>'pay-debts', 'class'=>'btn btn-primary')); ?>
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
<!-- paginator con estilo bootstrap 3.0 -->
<div class="pagination pagination-right">
    <ul class="pagination">
        <?php
            if($this->Paginator->prevPage)
                echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li' ) );
            echo $this->Paginator->first( '<< Primera Página', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li' ) );
            echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );
            echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li' ) );
            echo $this->Paginator->last( ' Última Página >>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li' ) );
        ?>
    </ul>
</div>
<!-- paginator con estilo bootstrap 3.0 -->

<script>
	$( document ).ready(function() {
		$('input:checkbox.debtor-all-checks').on('click', function() {
			$('input:checkbox.debtor-check').trigger( "click" );
		});

	    $('#pay-debts').on('click', function(){
	    	var id_person = [];

	    	$('input:checkbox.debtor-check').each(function () {
	    		if(this.checked) {
	    			id_person.push(this.value);
	    		}
	    	});

	    	if(id_person.length  === 0) {
	    		alert('Debes Seleccionar almenos un usuario para pagar su deuda.');
	    	} else {

		    	$.ajax({
		    		url: '/pays/pay_debts/',
		    		data: {id_person:id_person},
		    		method: 'post',
		    		dataType: 'html',
		    		success: function(msg) {

		    			$('#content').prepend(msg);
						setTimeout(function() {
							location.href='/people/debtors/';
						}, 3000);
		    		}
		    	});
	    	}

	    });
	});
</script>
