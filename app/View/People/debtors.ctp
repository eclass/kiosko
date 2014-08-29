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
<table>
	<tr>
		<th><?php echo $this->Paginator->sort('Person.name', 'Nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('Person.rut', 'Rut'); ?></th>
		<th><?php echo $this->Paginator->sort('Person.debt', 'Deuda'); ?></th>
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
