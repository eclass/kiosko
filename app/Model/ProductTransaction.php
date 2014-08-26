<?php
class ProductTransaction extends Model {
	public $belongsTo = array(
		'Transaction' => array(
			'foreignKey' => 'id_transaction'
		),
		'Product' => array(
			'foreignKey' => 'id_product'
		)
	);
}
