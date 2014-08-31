<?php
class Pay extends Model {
	public $belongsTo = array(
		'Person' => array(
			'foreignKey' => 'id_person'
		),
	);
}
