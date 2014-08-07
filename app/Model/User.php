<?php

	class User extends Model {
		public $paginate = array(
    		'limit' => 25,
    		'order' => array(
        		'Users.id' => 'asc'
    		)
		);
	}

?>
