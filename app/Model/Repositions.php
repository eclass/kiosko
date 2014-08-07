<?php

	class Reposition extends Model {
		public $belongsTo = 'Product';

		public $paginate = array(
    		'limit' => 25,
    		'order' => array(
        		'Reposition.id' => 'asc'
    		)
		);
	}

?>
