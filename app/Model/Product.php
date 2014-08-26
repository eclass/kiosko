<?php
class Product extends Model {

	public $hasMany = array(
		'Reposition' => array(
			'foreignKey' => 'id_product',
			'order' => array(
				'Reposition.date' => 'DESC'
			)
		)
	);

	public $hasAndBelongToMany = array(
		'Transaction' => array(
			'foreignKey' => 'id_product'
		)
	);

	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Users.id' => 'asc'
		)
	);
}
