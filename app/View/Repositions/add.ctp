<?php
if (!empty($product)) {
	echo $this->Html->link(
		'Volver',
		array('controller' => 'products', 'action' => 'view', $product['Product']['id']),
		array('class' => '')
	);
}
?>
<h2>Agregar Reposición</h2>
<?php
echo $this->Form->create('Reposition', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-3 control-label'
		),
		'wrapInput' => 'col col-md-9',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
));

if (!empty($product)) {
	echo $this->Form->input('Reposition.Product.name', array('label' => 'Nombre Producto', 'readonly'));
	echo $this->Form->input('Reposition.Product.code', array('label' => 'Código Producto', 'readonly'));
}
echo $this->Form->input('cantity', array('label' => 'Cantidad'));
if (empty($product)) {
	echo $this->Form->input('Reposition.Product.code', array('label' => 'Código Producto'));
}

echo '<div class="form-group">';
	echo $this->Form->submit('Guardar', array(
		'div' => 'col col-md-9 col-md-offset-3',
		'class' => 'btn btn-default'
	));
echo '</div>';
echo $this->Form->end();
