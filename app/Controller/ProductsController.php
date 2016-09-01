<?php

class ProductsController extends AppController {
	
	var $uses = array('Category','Product','Gallery','User','Orderdetail','Order','Cart_detail');
	public $components = array('Session','Paginator','RequestHandler','Qimage');
	var $helpers = array('Html', 'Form','Session','Paginator','Js' => array('Jquery'));
	
	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('product.name' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_login','admin_add', 'admin_subcategory','product_list','product_detail','add_to_cart','Auth'); 
    }
	


	public function admin_login() {
		
		//if already logged-in, redirect
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'admin_index'));		
		}
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				//pr($this->Auth); exit;
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}

	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}

    public function admin_product_list($id = Null) {
		if($id)
		{
			 $subcategory = $this->Category->find('first', array('conditions' => array('Category.id' => $id)));
		 // pr($category);exit;
		   //pr($category['category_name']);exit;
		       if(isset($id)){
			   $this->Session->write("type",'subcategory');
			   $this->Session->write("categ",$subcategory['Category']['category_name']);
			   }
			$this->Paginator->settings= array(
			'conditions' => array('Product.category_id' => $id),
			'limit' => 10,
			'order' => array('Products.product_name' => 'asc' )
		);	
		}
		else{
			$this->Session->delete('type');
			$this->Session->delete('categ');
		$this->Paginator->settings= array(
			'limit' => 10,
			'order' => array('Products.product_name' => 'asc' )
		);
		}
		$products = $this->Paginator->paginate('Product');
		//pr($products);exit;
		$this->set(compact('products'));
		
			
    }
	
	public function admin_product_detail($id = Null){
		if($id){
			$this->Product->recursive = 1;
			 $this->request->data = $this->Product->find('first',array('conditions' => array('Product.id' => $id)));
			//pr($product);exit;
		}
		
	}

	
	
	public function admin_subcategory() {
		$subcategory = array();
		if (isset($this->request['data']['id'])) {
			$subcategory = $this->Category->find('list', array(
				'fields' => array(
					'id',
					'category_name',
				),
				'conditions' => array(
					'Category.parent_id' => $this->request['data']['id']
				)
			));
		}
		//pr($this->request);exit;
		header('Content-Type: application/json');
		echo json_encode($subcategory);
		exit();
	}

    public function admin_add($id = Null) {
		
		
		      $categories = $this->Category->find('list', array(
			'fields' => array(
				'id',
				'category_name',
				
			      ),'conditions'=>array('Category.parent_id' => 0),
		    ));
		
              $this->set('categories',$categories);
	
	
	        $this->Product->create();
			if ($this->request->is('post') || $this->request->is('put')) {
			//pr($this->request->data[]);exit;
			$postData=$this->data['Product'];
			//pr($postData);exit;
			if ($this->Product->save($postData)) 
 			{
              $lastInsertedId = $this->Product->id;	
              //pr($postData);exit;			  
			  for($i=1;$i<4;$i++)
				{
					if(is_array($postData['image'.$i]) && $postData['image'.$i]['name']!='') {
					$name = explode('.', $postData['image'.$i]['name']);
					//pr($name);exit;
						$ext	=	strtolower($name[count($name)-1]);
						$file_name = 'image'.$i.'_'.$lastInsertedId.'_'.strtotime(date('Y-m-d H:i:s')).".".$ext;
						$finalPath = "../webroot/files/images/";
						$postData['image'.$i]['name']= $file_name;
						$imagedata['file'] = $postData['image'.$i];
						$imagedata['path'] = $finalPath;
						$uploadedImage = $this->Qimage->copy($imagedata);
						$thumbData['file'] = $uploadedImage;
						$thumbData['width'] = '100';
						$thumbData['height'] = '100';
						$thumbData['output'] = "../webroot/files/thumbs100x100/";
						$this->Qimage->resize($thumbData);
						$thumbData1['file'] = $uploadedImage;
						$thumbData1['width'] = '200';
						$thumbData1['height'] = '200';
						$thumbData1['output'] = "../webroot/files/large/";
						$this->Qimage->resize($thumbData1);
						$errors = $this->Qimage->getErrors();
						if(count($errors)>0){
							//pr($errors);exit;
						}
						 else{
							
							$data = array();
							//$this->Gallery>create();
                            $data['Gallary']['product_id'] = $lastInsertedId;
							$data['Gallary']['images'] = $file_name;
							//pr($data['Gallary']);
							$this->Gallery->saveAll($data['Gallary']);
							  
							 
						}
					}
				}			
			
			
				$this->Session->setFlash('Your product has been saved.');
				$this->redirect(array('action' => 'product_list'));
			}
			else 
			{
				$this->Session->setFlash('Unable to add your product.');
			}	
        }
		
		    if($id != null){
			
			$product = $this->Product->find('first', array('conditions' => array('Product.id' => $id),'recursive' => 1));
	        //pr($product);exit;
	        $this->request->data =$product;
			
		    }
    }

    public function admin_edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a product id');
				$this->redirect(array('action'=>'list'));
			}

			$user = $this->Product->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid Product ID Provided');
				$this->redirect(array('action'=>'list'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Product->id = $id;
				if ($this->Product->save($this->request->data)) {
					$this->Session->setFlash(__('The product detail has been updated'));
					$this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your product detail.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $product;
			}
    }

	//---------------product active or in-active method-----------
    public function admin_delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a product id');
			$this->redirect(array('action'=>'product_list'));
		}
		
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'product_list'));
        }
        if ($this->Product->saveField('status', "Inactive")) {
            $this->Session->setFlash(__('Product deleted'));
            $this->redirect(array('action' => 'product_list'));
        }
        $this->Session->setFlash(__('Product was not deleted'));
        $this->redirect(array('action' => 'product_list'));
    }
	
	public function admin_activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a Product id');
			$this->redirect(array('action'=>'product_list'));
		}
		
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            $this->Session->setFlash('Invalid product id provided');
			$this->redirect(array('action'=>'product_list'));
        }
        if ($this->Product->saveField('status', "Active")) {
            $this->Session->setFlash(__('Product re-activated'));
            $this->redirect(array('action' => 'product_list'));
        }
        $this->Session->setFlash(__('Product was not re-activated'));
        $this->redirect(array('action' => 'product_list'));
    }
	
	//----------------- pending or delivered order---------------
	public function admin_Order_Pending($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a order id');
			$this->redirect(array('action'=>'order_list'));
		}
		
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            $this->Session->setFlash('Invalid order id provided');
			$this->redirect(array('action'=>'order_list'));
        }
        if ($this->Order->saveField('status', "Pending")) {
            $this->Session->setFlash(__('Product not deliever till now'));
            $this->redirect(array('action' => 'order_list'));
        }
        $this->Session->setFlash(__('Product delievered'));
        $this->redirect(array('action' => 'order_list'));
    }
	
	public function admin_Order_delievered($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a order id');
			$this->redirect(array('action'=>'order_list'));
		}
		
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            $this->Session->setFlash('Invalid order id provided');
			$this->redirect(array('action'=>'order_list'));
        }
        if ($this->Order->saveField('status', "Delievered")) {
            $this->Session->setFlash(__('Product deliever'));
            $this->redirect(array('action' => 'order_list'));
        }
        $this->Session->setFlash(__('Product was not deliever'));
        $this->redirect(array('action' => 'order_list'));
    }
	
	//  user orders list
	public function admin_order_list($id = null) {
		if($id){
			$this->Paginator->settings= array(
			'conditions' => array('Order.user_id' => $id),
			'limit' => 10,
			'order' => array('Orders.ordernumber' => 'asc' )
		    );
			if(isset($id)){
				$this->User->recursive = 0;
				$user = $this->User->findById($id);
				//pr($user);exit;
			   $this->Session->write("username",$user['User']['username']);
			   }
		    $orders = $this->Paginator->paginate('Order');
			    $i=0;
				foreach($orders as $order){
					//pr($order['Order']['id']);exit;
					$orders[$i]['Order']['products'] = $this->Orderdetail->find("count",  array("conditions" => array("Orderdetail.order_id" => $order['Order']['id'])));
					$i++;				
				}
		   
					
		        }else{
			    $this->Session->delete('username');
		        $this->Paginator->settings= array(
			    'limit' => 10,
			    'order' => array('Orders.ordernumber' => 'asc' )
		        );
				
		        $orders = $this->Paginator->paginate('Order');
			    $i=0;
				foreach($orders as $order){
					//pr($order['Order']['id']);exit;
					$orders[$i]['Order']['products'] = $this->Orderdetail->find("count",  array("conditions" => array("Orderdetail.order_id" => $order['Order']['id'])));
					$this->User->recursive = 0;
					$orders[$i]['Order']['user'] = $this->User->findById($order['Order']['user_id']);
					$i++;				
				}
			//pr($orders);exit;	
		    	
		}
		 
		 $this->set(compact('orders'));
	
	}
	public function admin_order_detail($id = null) {
		
		if($id){
			
			$orderdetail = $this->Order->find("first", array("conditions" => array("Order.id" => $id)));
		//pr($orderdetail);exit;
		}
	}
	
	public function product_list($id = Null) {
		$this->layout='openuser_layout';
		if($id)
		{
			 $subcategory = $this->Category->find('first', array('conditions' => array('Category.id' => $id)));
			  //pr($subcategory);exit;
			  $category = $this->Category->find('first', array('conditions' => array('Category.id' => $subcategory['Category']['parent_id'])));
		    
		     //pr($category);exit;
		       if(isset($id)){
			   $this->Session->write("type",$category['Category']['category_name']);
			   $this->Session->write("categ",$subcategory['Category']['category_name']);
			   }
			$this->Paginator->settings= array(
			'conditions' => array('Product.category_id' => $id),
			'limit' => 12,
			'order' => array('Products.product_name' => 'asc' )
		  );	
		}
		
		$products = $this->Paginator->paginate('Product');
		//pr($products);exit;
		$this->set(compact('products'));
	}	
	
	public function product_detail($id = Null){
		$this->layout='openuser_layout';
		if($id){
			$this->Product->recursive = 1;
			 $this->request->data = $this->Product->find('first',array('conditions' => array('Product.id' => $id)));
			//pr($this->request->data);exit;
			$this->set(compact('$this->request->data'));
		}
		
	}
	
	public function add_to_cart($id = Null){
		//$user_id =  $this->Auth->user('id');
		if($this->Auth->User('id')){
			$user_id =$this->Auth->User('id');
			//pr($user_id);exit;
			
		}else{
			$this->redirect(array('controller'=>'Users','action'=>'login'));
		}
		
		$this->Cart_detail->create();
		if ($this->request->is('post') || $this->request->is('put')) {
				$postData=$this->data['Cart_detail'];
				//pr($postData);exit;
				$id = $postData['product_id'];
				$quantity = $postData['quantity'];
				
				$this->Product->recursive = 1;
				$product = $this->Product->find("first",array("conditions"=>array("Product.id"=>$id)));
				//pr($product);exit;
				$carddetail = $this->Cart_detail->find("first",array("conditions"=>array("Cart_detail.product_id"=>$id, "Cart_detail.user_id"=>$user_id)));
				$totalunitsinstock = $product['Product']['unitsinstock'];
				$totalunitsonorder = $product['Product']['unitsonorder'];
				//pr($carddetail);
				if($quantity <=  $totalunitsinstock){
					if($carddetail){
						$quantity_incart = $carddetail['Cart_detail']['quantity'] + $quantity;
						//pr($quantity_incart);exit;
						$this->Cart_detail->query("UPDATE cart_details set quantity = '".$quantity_incart."' where user_id = '".$user_id."' and product_id = '".$id."'");
                        $this->Session->setFlash(__('already added , quantity increase'));
												
					}else{
						$this->Cart_detail->set($this->request->data);
						$this->request->data['Cart_detail']['user_id'] = $user_id;
						$this->request->data['Cart_detail']['product_id'] = $id;
						$this->request->data['Cart_detail']['quantity'] = $quantity;
						$this->request->data['Cart_detail']['created'] = date('Y-m-d H:i:s');
						if($this->Cart_detail->save($this->request->data)){	
								$this->Session->setFlash(__('added in cart successfully'));
						}	
					}	
						$remaining_quantity = $totalunitsinstock - $quantity;
						
						$order_quantity =  $totalunitsonorder + $quantity;
						//pr($remaining_quantity);pr($order_quantity);exit;
						$this->Product->query("UPDATE products set unitsinstock = '".$remaining_quantity."', unitsonorder = '".$order_quantity."' where id = '".$id."'");
						$this->redirect(array('action' => 'product_detail',$id));
						exit;				
				}else{
					$this->Session->setFlash(__('out of stock'));
					return $this->redirect(array('controller' => 'products', 'action' => 'product_detail',$id));
					exit;
				}	
		}
	}
	
	
	

}

?>