<table>
	<tr>
		<td>Comprador</td>
		<td><?php echo $transaction['Person']['name']?></td>
	</tr>
	<tr>
		<td>Fecha</td>
		<td><?php echo $transaction['Transaction']['date']?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo $transaction['Transaction']['total']?></td>
	</tr>
</table>

<h2>Productos</h2>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<tr>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
		</tr>
		<?php
		foreach($transaction['Product'] as $product){ ?>
			<tr>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['ProductsTransaction']['cantity']; ?></td>
				<td><?php echo $product['ProductsTransaction']['amount']; ?></td>
			</tr>
		<?php
		}
		?>
	</table>
</div>
