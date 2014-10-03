<table>
	<thead>
		<tr>
			<th><?php echo __('Nombre'); ?></th>
			<th><?php echo __('RUT'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('Código Barra'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($people as $person): ?>
		<tr>
			<td><?php echo $person['Person']['name']; ?></td>
			<td><?php echo $person['Person']['rut']; ?></td>
			<td><?php echo $person['Person']['email']; ?></td>
			<td><?php
			echo $this->Barcode->display(
				'RUT' . $person['Person']['rut'],
				array('p_label' => 'Y', 'p_bcType' => 1, 'p_charHeight' => 50),
				array('width' => 160, 'height' => 65)
			);
			?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
