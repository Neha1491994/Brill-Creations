<?php
class Orderdetail extends AppModel {
	var $name='Orderdetail';
	
	 public $belongsTo = array(
        'Product' => array(
            'className' => 'Product',
			'foreignKey' => 'product_id'
        ),
		'Order' => array(
            'className' => 'Order',
			'foreignKey' => 'order_id'
        )
		    
    );
}
?>	
