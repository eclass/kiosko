<?php
echo $this->Form->create('Reposition');

echo $this->Form->input('Reposition.Product.name', array('label' => 'Product'));
echo $this->Form->input('cantity', array('label' => 'Cantidad'));
echo $this->Form->end('Guardar');
?>
