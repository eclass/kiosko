<?php
if (!empty($persona)) {
	echo $this->Html->link(
		'Volver',
		array('controller' => 'people', 'action' => 'view', $person['Person']['id']),
		array('class' => '')
	);
}
?>
<h2>Agregar Pago</h2>

<?php
echo $this->Form->create('Pay', array(
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

if (!empty($person)) {
	echo $this->Form->input('Pay.Person.rut', array('label' => 'Rut Persona', 'readonly'));
	echo $this->Form->input('Pay.Person.name', array('label' => 'Nombre Persona', 'readonly'));
}
echo $this->Form->input('amount', array(
	'label' => 'Monto',
	'beforeInput' => '<div class="input-group"><span class="input-group-addon">$</span>',
	'afterInput' => '</div>'
));
if (empty($persona)) {
	echo $this->Form->input('Pay.Person.rut', array('label' => 'Rut Persona', 'type' => 'text'));
}

echo '<div class="form-group">';
	echo $this->Form->submit('Guardar', array(
		'div' => 'col col-md-9 col-md-offset-3',
		'class' => 'btn btn-default'
	));
echo '</div>';
echo $this->Form->end();
