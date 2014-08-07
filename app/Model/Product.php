<?php

	class Product extends Model {

		public $hasMany = 'Reposition';

		public $paginate = array(
    		'limit' => 25,
    		'order' => array(
        		'Users.id' => 'asc'
    		)
		);
	}

?>
