<h2>Compra</h2>
<table class="table-responsive table table-hover">
	<tr>
		<td><b>Comprador : </b></td>
		<td>
			<?php echo $transaction['Person']['name']?> <br/>
			<?php echo $transaction['Person']['rut']?>
		</td>
	</tr>
	<tr>
		<td><b>Fecha : </b></td>
		<td><?php echo $transaction['Transaction']['date']?></td>
	</tr>
	<tr>
		<td><b>Total : </b></td>
		<td><?php echo $this->Number->currency($transaction['Transaction']['total'], 'CLP'); ?></td>
	</tr>
</table>

<h3>Detalle productos</h3>
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
				<td><?php echo $this->Number->currency($product['ProductsTransaction']['amount'],'CLP'); ?></td>
			</tr>
		<?php
		}
		?>
	</table>
</div>
