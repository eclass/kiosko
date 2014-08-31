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

	public $hasAndBelongsToMany = array(
		'Transaction' => array(
			'foreignKey' => 'id_product',
			'associationForeignKey' => 'id_transaction'
		)
	);

}
