<table width="600">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Rut</th>
			<th>Deuda</th>
			<th>Pagado</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($debtors as $debtor) { ?>
			<tr>
				<td style="border:1px solid #000000"><?php echo $debtor['Person']['name']; ?></td>
				<td style="border:1px solid #000000"><?php echo $debtor['Person']['rut']; ?></td>
				<td style="border:1px solid #000000"><?php echo $debtor['Person']['debt']; ?></td>
				<td style="border:1px solid #000000"></td>
			</tr>
		<?php } ?>
	</tbody>
</table>