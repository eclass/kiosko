<h2>Datos de la Persona</h2>

<?php
echo $this->Form->create('Person', array(
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
echo $this->Form->input('rut', array('label' => 'Rut'));
echo $this->Form->input('email', array('label' => 'Email'));

echo '<div class="form-group">';
	echo $this->Form->submit('Guardar', array(
		'div' => 'col col-md-9 col-md-offset-3',
		'class' => 'btn btn-default'
	));
echo '</div>';
echo $this->Form->end();
