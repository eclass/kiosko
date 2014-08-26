<?php
class Reposition extends Model {

	public $belongsTo = array(
		'Product' => array(
			'foreignKey' => 'id_product'
		),
	);

	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Reposition.id' => 'asc'
		)
	);
}