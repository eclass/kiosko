<table>
	<thead>
		<tr>
			<th><?php echo __('Nombre'); ?></th>
			<th><?php echo __('RUT'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('Deuda'); ?></th>
			<th><?php echo __('Código Barra'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($people as $person): ?>
		<tr>
			<td><?php echo $person['Person']['name']; ?></td>
			<td><?php echo $person['Person']['rut']; ?></td>
			<td><?php echo $person['Person']['email']; ?></td>
			<td><?php echo $this->Number->currency($person['Person']['debt'], 'CLP'); ?></td>
			<td><?php
			echo $this->Barcode->display(
				'RUT' . $person['Person']['rut'],
				array(
					'p_label' => 'Y', 'p_bcType' => 4, 'p_xDim' => 1, 'p_charHeight' => 50
				)
			);
			?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
