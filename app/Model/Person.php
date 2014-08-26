<?php
class Person extends Model {
	public $hasMany = array(
		'Transaction' => array(
			'foreignKey' => 'id_person'
		),
		'Pay' => array(
			'foreignKey' => 'id_person'
		)
	);

	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Persons.id' => 'asc'
		)
	);
}

