<?php
echo $this->Form->create('Pay');

echo $this->Form->input('Pay.Person.rut', array('label' => 'Rut Persona'));
echo $this->Form->input('amount', array('label' => 'Monto'));

echo $this->Form->end('Guardar');
?>
