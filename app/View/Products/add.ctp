<h2>Datos del Producto</h2>

<?php
echo $this->Form->create('Product', array(
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

echo $this->Form->input('name', array('label' => 'Nombre'));
echo $this->Form->input('price', array('label' => 'Precio'));
echo $this->Form->input('description', array('label' => 'Descripción'));
echo $this->Form->input('code', array('label' => 'Código'));

echo '<div class="form-group">';
	echo $this->Form->submit('Guardar', array(
		'div' => 'col col-md-9 col-md-offset-3',
		'class' => 'btn btn-default'
	));
echo '</div>';
echo $this->Form->end();
