<?php
	echo $this->Html->link(
		'Agregar Producto',
		array('controller' => 'products', 'action' => 'add'),
		array('class' => 'btn btn-success')
	);
?>
<hr />


<div class="row">
	<?php echo $this->Form->create(null, array('url' => array('controller' => 'products', 'action' => 'index'))); ?>
	<div class="col-md-10 col-sm-9 col-xs-12">
		<?php
		echo $this->AutoComplete->input(
			'Product.name',
			array(
				'label' => false,
				'autocomplete' => 'off',
				'class' => 'form-control input-search',
				'placeholder' => 'Ingresa Nombre del producto que buscas',
				'autoCompleteUrl' => $this->Html->url(
					array(
						'controller' => 'products',
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
		<th><?php echo $this->Paginator->sort('Product.name', 'Nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('Product.code', 'Barcode'); ?></th>
		<th><?php echo $this->Paginator->sort('Product.price', 'Precio'); ?></th>
		<th><?php echo $this->Paginator->sort('Product.stock', 'Stock'); ?></th>
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
			<td><?php echo $product['Product']['code']; ?></td>
			<td><?php echo $this->Number->currency($product['Product']['price'], 'CLP'); ?></td>
			<td><?php echo $product['Product']['stock']; ?></td>
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
					array('class' => 'button') ,
					"La acción eliminará el producto, ¿Está seguro?"
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
