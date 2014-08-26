<?php
echo $this->Form->create('Person');

echo $this->Form->input('name', array('label' => 'Nombre'));
echo $this->Form->input('rut', array('label' => 'Rut'));
echo $this->Form->input('email', array('label' => 'Email'));

echo $this->Form->end('Guardar');
?>
