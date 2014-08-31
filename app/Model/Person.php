<?php
class Person extends Model {
	public $hasMany = array(
		'Transaction' => array(
			'foreignKey' => 'id_person',
			'order' => 'date DESC'
		),
		'Pay' => array(
			'foreignKey' => 'id_person',
			'order' => 'date DESC'
		)
	);
}
