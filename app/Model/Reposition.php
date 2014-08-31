<?php
class Reposition extends Model {

	public $belongsTo = array(
		'Product' => array(
			'foreignKey' => 'id_product'
		),
	);

}
