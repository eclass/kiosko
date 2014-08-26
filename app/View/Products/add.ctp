<?php
echo $this->Form->create('Product');

echo $this->Form->input('name', array('label' => 'Nombre'));
echo $this->Form->input('code', array('label' => 'Código'));
echo $this->Form->input('price', array('label' => 'Precio'));
echo $this->Form->input('description', array('label' => 'Descripción'));

echo $this->Form->end('Guardar');
?>
