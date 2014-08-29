<?php
echo $this->Session->flash();
?>
<?php
	echo $this->Html->link(
		'Agregar Pago',
		array('controller' => 'pays', 'action' => 'add'),
		array('class' => 'button')
	);
?>
<br />
<br />
<table>
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
				<?php echo $pay['Pay']['date']; ?>
			</td>
			<td>
				<?php echo $pay['Pay']['amount']; ?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Editar',
					array('controller' => 'people', 'action' => 'add', $pay['Pay']['id']),
					array('class' => 'button')
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
