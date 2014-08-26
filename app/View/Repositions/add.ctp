<?php
echo $this->Form->create('Reposition');

echo $this->Form->input('Reposition.Product.name', array('label' => 'Product'));
echo $this->Form->input('cantity', array('label' => 'Cantidad'));
echo $this->Form->input('date', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 10));
echo $this->Form->end('Guardar');
?>
