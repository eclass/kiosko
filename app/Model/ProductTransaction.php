<?php
class ProductTransaction extends Model {
	public $useTable = 'products_transactions';

	public $belongsTo = array(
		'Transaction' => array(
			'foreignKey' => 'id_transaction'
		),
		'Product' => array(
			'foreignKey' => 'id_product'
		)
	);
}
