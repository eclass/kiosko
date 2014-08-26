<h2><?php echo $product['Product']['name']?></h2>
<?php
echo $this->Html->link(
	'Editar',
	array('controller' => 'Products', 'action' => 'add', $product['Product']['id']),
	array('class' => 'button', 'style' => 'float: right')
);
?>
<table>
	<tr>
		<td>Código</td>
		<td><?php echo $product['Product']['code']?></td>
	</tr>
	<tr>
		<td>Precio</td>
		<td><?php echo $product['Product']['price']?></td>
	</tr>
	<tr>
		<td>Stock</td>
		<td><?php echo $product['Product']['stock']?></td>
	</tr>
	<tr>
		<td>Descripción</td>
		<td><?php echo $product['Product']['description']?></td>
	</tr>
</table>

<h2>Últimas reposiciones</h2>
<?php
echo $this->Html->link(
	'Agregar Reposición',
	array('controller' => 'Repositions', 'action' => 'add', 0, $product['Product']['id']),
	array('class' => 'button', 'style' => 'float: right')
);

if(!empty($product['Reposition'])){ ?>
	<table>
		<tr>
			<th>Fecha</th>
			<th>Cantidad</th>
		</tr>
		<?php
		foreach($product['Reposition'] as $reposition){ ?>
			<tr>
				<td><?php echo $reposition['date']; ?></td>
				<td><?php echo $reposition['cantity']; ?></td>
			</tr>
		<?php
		}
		?>
	</table>
<?php
}
else{
	echo '<p>Sin reposiciones realizadas</p>';
}
