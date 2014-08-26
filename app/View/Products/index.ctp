<?php
echo $this->Session->flash();
?>
<?php
	echo $this->Html->link(
		'Crear Producto',
		array('controller' => 'products', 'action' => 'add'),
		array('class' => 'button')
	);
?>
<br />
<br />
<table>
	<tr>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Stock</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<?php
	foreach($products as $product){ ?>
		<tr>
			<td>
				<?php
				echo $this->Html->link(
					$product['Product']['name'],
					array('controller' => 'products', 'action' => 'view', $product['Product']['id'])
				);
				?>
			</td>
			<td>
				<?php echo $product['Product']['price']; ?>
			</td>
			<td>
				<?php echo $product['Product']['stock']; ?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Editar',
					array('controller' => 'products', 'action' => 'add', $product['Product']['id']),
					array('class' => 'button')
				);
				?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Eliminar',
					array('controller' => 'products', 'action' => 'delete', $product['Product']['id']),
					array('class' => 'button')
				);
				?>
			</td>
		</tr>
		<?php
	}
?>
</table>
<?php
pr($products);
?>
