<?php
class Transaction extends Model {
	public $belongsTo = array(
		'Person' => array(
			'foreignKey' => 'id_person'
		),
	);

	public $hasAndBelongsToMany = array(
		'Product' => array(
			'foreignKey' => 'id_transaction',
			'associationForeignKey' => 'id_product'
		)
	);

	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Pay.id' => 'asc'
		)
	);
}
