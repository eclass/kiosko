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
<h2>Buscar Persona</h2>
<?php
	echo $this->Form->create(null, array(
	    'url' => array('controller' => 'people', 'action' => 'index')
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
							'action'=>'auto_complete',
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
