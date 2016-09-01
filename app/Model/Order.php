<?php
class Order extends AppModel {
	var $name='Order';
	 public $belongsTo = array(
        'User' => array(
            'className' => 'User',
			'foreignKey' => 'user_id'
        )
		    
    );
	
	 /*public $hasOne = array(
	        'Orderdetail' => array(
            'className' => 'Orderdetail',
			'foreignKey' => 'order_id'
        )
		    
    );*/
}
?>