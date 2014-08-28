<?php
class Pay extends Model {
	public $belongsTo = array(
		'Person' => array(
			'foreignKey' => 'id_person'
		),
	);

	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'Pay.date' => 'desc'
		)
	);
}
