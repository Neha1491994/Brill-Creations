<?php 
class UsersController extends AppController {
	//Specify View folder
	var $name     = 'Users';
	//Specify Layout
	var $layout ='openuser_layout'; 
	//days for schedule
	
	//Specify  models(tables)	
	var $uses = array('Admin','User','Cart_detail','Address','Order','Orderdetail','Product','Category');	
	public $components = array('Session','RequestHandler','Paginator');
	var $helpers = array('Session','Js' => array('Jquery'),'Paginator');
	
	
 # function checks individually if the admin/user's function required login or not. If required, then include the name of the function in the array
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_login','admin_logout','login','Auth','signup','cart_detail');
		//$this->Auth->loginAction = array('controller'=>'admins', 'action'=>'admin_login');
    }
	
	
	public function login() {
	  //$this->Session->destroy('type');	
	  if ($this->request->is('post')) {
		 // pr($this->data);exit;
			if ($this->Auth->login()) {
                            $id=$this->Auth->User('id');
                            $username=$this->Auth->User('username');
							//pr($username);exit;
							$this->Session->write("usertype",'User');
	                        return $this->redirect($this->Auth->redirectUrl());
				  
			}
			
			
		}
	}
	
	
	

	public function logout() {
		$this->Session->destroy();
		$this->Auth->logout();
		return $this->redirect($this->Auth->redirectUrl());
	}
	
	public function signup() {
			if ($this->request->is('post')) {
				//pr($this->request->data);exit;
				$this->User->create();
				$userdata = $this->request->data;
				//pr($userdata);exit;
				if ($this->User->save($userdata)) {
					//$lastinsertid = $this->User->id;
					
					$data = array();
					//$data['User']['id']
                    $data['User']['username'] = $userdata['User']['firstname'].$userdata['User']['lastname'];
					//pr($data['firstname']);exit;
                    $this->User->save($data['User']);					
					$this->Session->setFlash('You have Sucessfully singn-up');
					return $this->redirect(array('action' => 'login'));
				} 
				else 
				$this->Session->setFlash('You have entered worng detail');
			}
		}
	/*
		Function to display statistics on home page
	*/
	function admin_index() {
		//echo $this->authorizeType();
		if($this->Session->check('type')){
			
				//pr($this->Session->read('type'));
				//pr($this->Session->read('id'));
				//exit;
				
	
		}
		

	}	
	
	public function cart_count(){
		if($this->Auth->User()){
			$user_id = $this->Auth->User('id');
			//pr($user_id);exit;
			$items =0;
			$items = $this->Cart_detail->find("count",array("conditions" => array("Cart_detail.user_id" => $user_id)));
			//pr($items);exit;
			if($items){
			
				//foreach($items as $item)
				//$total_product =$total$item['Cart_detail']['quantity'];
				//
			
				return $items;
			}else 
			return $items;
		}
	} 
	
	public function cart_detail() {
		
		if($this->Auth->User()){
			$user_id = $this->Auth->User('id');
			//pr($user_id);exit;
			//$items = $this->Cart_detail->find("all",array("conditions" => array("Cart_detail.user_id" => $user_id)));
			//$this->recursive = 1;
			$this->Paginator->settings= array(
			'conditions' => array("Cart_detail.user_id" => $user_id,),
			'recursive' => 2,
			'limit' => 10,
			'order' => array('Orders.ordernumber' => 'asc' )
		    );
			
			$items = $this->Paginator->paginate('Cart_detail');
			//pr($items[0]['Product']['Gallery'][0]['images']);exit;
			$this->set(compact('items'));
		}else
			$this->Session->setFlash('Shopping Cart is empty!');

	}
	
	public function cart_remove($id = NULL) {    
		$this->Cart_detail->delete($id);    
		$this->Session->setFlash('Item has deleted'); 

		$this->redirect(array('action'=>'cart_detail')); 
	}
	
	public function edit_profile(){
		$this->layout='openuser_layout';
		$user_id = $this->Auth->User('id');
			//pr($user_id);
			if ($this->request->is('post') || $this->request->is('put')) {
				//pr($this->request);exit;
				if(isset($this->data['User']))
				{
					$postData=$this->data['User'];
					//pr($postData);exit;
					$this->User->query("UPDATE users set username = '".$postData['username']."', firstname = '".$postData['firstname']."', lastname = '".$postData['lastname']."', email = '".$postData['email']."',mobile = '".$postData['mobile']."' where id = '".$user_id."'");
				}elseif(isset($this->data['Password']))
				{
					$passwordData = $this->data['Password'];
					//pr($passwordData);exit;
					$pass = AuthComponent::password($passwordData['oldPassword']);
					$user = $this->User->find("first", array("conditions" => array("User.id" => $user_id,"User.password"=>$pass),"recursive"=>0));
				//	pr($user);exit;
					if($user){
						if($passwordData['password'] == $passwordData['confirm_password']){
							//if($this->User->validates(array('fieldList' => array('password')))){
								$this->User->id = $user['User']['id'];
								$this->User->saveField("password",$passwordData['password']);
								$this->Session->setFlash('successfully set password');
								$this->redirect(array('action' => 'edit_profile'));
						        exit;
							//}
						}else{
						$this->Session->setFlash('password do not match');
						$this->redirect(array('action' => 'edit_profile'));
						exit;
						}
					}else{
						$this->Session->setFlash('oldPassword is wrong');
						$this->redirect(array('action' => 'edit_profile'));
						exit;
					}
					
				}
				   
			}
			
			$user = $this->User->find("count", array("conditions" => array("User.id" => $user_id)));
			if($user > 0){
				$users = $this->User->find('first',
										array('conditions'=>array('User.id'=>$user_id),
										//'order'=>'Order.id DESC',
										'recursive'=>0)
										);
			  // pr($users);exit;
			  // $this->set(compact('users'));
			  $this->request->data = $users;
			}
			   
			
	        
	}
	

	public function profile($id = Null){
		if(isset($this->request->data['id'])) $id = $this->request->data['id'];
		$this->layout='openuser_layout';
		$user_id = $this->Auth->User('id');
		    //pr($user_id);
			
			$user = $this->User->find("count", array("conditions" => array("User.id" => $user_id)));
			if($user > 0){
				$users = $this->User->find('first',
										array('conditions'=>array('User.id'=>$user_id),
										//'order'=>'Order.id DESC',
										'recursive'=>0)
										);
			  //pr($users);exit;
				$addresses = $this->Address->find("all", array("conditions" => array("Address.user_id" => $user_id)));
				//pr($addresses);exit;
				if($addresses){
					$users['address'] = $addresses;
				}
			    $this->set(compact('users'));
			}
			
			 if($id != null){
				 $address = $this->Address->find("first", array("conditions" => array("Address.id" => $id)));
				   $this->request->data =$address;
				   echo json_encode($this->request->data); exit;
			 }
	}
	
	public function add_address(){	
		$this->layout='openuser_layout';
		$user_id = $this->Auth->User('id');
		
			if ($this->request->is('post') || $this->request->is('put')) 
			{
				$postdata = $this->data['Address'];
				//pr($postdata);exit;
				if($Postdata['id']== ""||$Postdata['id'] == Null){
					$postdata['user_id']   = $user_id;
					$this->Address->set($postdata);
						if($this->Address->saveAll($postdata)){
								$this->Session->setFlash('successsfully add address');
								$this->redirect(array('action' => 'profile'));
						        exit;
						}else{
						        $this->Session->setFlash('oops! something went wrong');
								$this->redirect(array('action' => 'profile'));
						        exit;
						}
				}else{
						$this->Address->query("UPDATE addresses set user_id = '".$postdata['user_id']."' , fullname = '".$postdata['fullname']."', address = '".$postdata['address']."', city = '".$postdata['city']."',
						state = '".$postdata['state']."', zipcode = '".$postdata['zipcode']."', contactnumber = '".$postdata['contactnumber']."' , landmark = '".$postdata['landmark']."', alternatenumber = '".$postdata['alternatenumber']."' where id = '".$postdata['id']."'");
				}
			}
		
		
	}

	 public function delete_address($id = Null){
		$user_id = $this->Auth->User('id');
		    //pr($id);exit;
			$count = $this->Address->find("first", array("conditions" => array("Address.user_id" => $user_id,"Address.id"=>$id)));
					if($count){
						$this->Address->query("delete from addresses where user_id='".$user_id."' and id = '".$id ."'");
						
					}
		            $this->Session->setFlash('Delete Successfully');
					$this->redirect(array('action' => 'profile'));
					exit;
	 }
	 
	 public function your_orders(){
		 $this->layout='openuser_layout';
		 $user_id = $this->Auth->User('id');
		 $user_orders = $this->Order->find("count", array("conditions" => array("Order.user_id" => $user_id)));
			//pr($user_orders);
			if($user_orders > 0){
				
			$this->Paginator->settings= array(
			'conditions' => array("Order.user_id" => $user_id,),
			'recursive' => 0,
			'limit' => 10,
			'order' => array('Order.id' => 'DESC' )
		    );
			$orders = $this->Paginator->paginate('Order');	
			
			$this->request->data =$orders;
			}else{
				//pr($user_orders);
				$this->Session->setFlash('oops! You have no any order');
				//$this->redirect(array('action' => 'your_orders'));
				$this->request->data = array();
			}	
	 }
	 
	 public function order_detail($id = NULL){
		  $this->layout='openuser_layout';
		  $user_id = $this->Auth->User('id');
		  if($id){
			 // pr($id);
			  $this->Orderdetail->recursive = 2;
			  $order_detail = $this->Orderdetail->find("all", array("conditions" => array("Orderdetail.order_id" => $id)));
			 // pr($order_detail);exit;
			  
		  }
		  $this->set(compact('order_detail'));
	 }
	 
	 // request for code
	 public function request_for_code($product_id = NULL) {
		$today = date("Ymd");
		$ordernumber ="D".$today."-".mt_rand(10000000,99999999);
		if($product_id){
			$user_id =$this->Auth->User('id');
			$user_email =$this->Auth->User('email');
			$items = $this->Cart_detail->find("first",array("conditions" => array("Cart_detail.product_id" => $product_id)));
			//pr($items);exit;
			
			$this->sendMail($user_email,'Request delievery mail', 'get_code', array('title_for_layout' =>'get_code delievery mail',"ordernumber"=>$ordernumber,"product"=>$items, "products" => '0'));	
			$this->redirect(array('action'=>'cart_detail')); 
		}else{
			$user_id = $this->Auth->User('id');
			$user_email =$this->Auth->User('email');
			$items = $this->Cart_detail->find("all",array("conditions" => array("Cart_detail.user_id" => $user_id)));
			//pr($items);exit;
			
			$this->sendMail($user_email,'Request delievery mail', 'get_code', array('title_for_layout' =>'get_code delievery mail',"ordernumber"=>$ordernumber,"products"=>$items,"product" => '0'));
			$this->redirect(array('action'=>'cart_detail')); 
		}
	}
	
	//search product with product and category name -----------
	
	public function search() {
	    $json_return = array();		
		if ($this->request->is('post') || $this->request->is('put')) 
		{	
	        //pr($this->request);
	        $keyword = $this->data['Search']['keyword'];
			//pr($keyword);exit;
			if($keyword != ""){
				$search['pro'] = $this->Product->query("SELECT * FROM products WHERE product_name LIKE '".$keyword."%' OR product_description LIKE '%".$keyword."%'");
				$search['cat'] = $this->Category->query("SELECT * FROM categories WHERE category_name LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%'");
               // pr($search);exit;				
				if($search['pro'] != NULL || $search['cat'] != NULL){
					//pr($search);exit;
					if($search['pro'] != "" &&  $search['pro'] != NULL){
							$subcate = array();
							$i = 0;
							foreach($search['pro'] as $Product){
								
									$subcate[$i]['id'] =  $Product['products']['id'];
									$subcate[$i]['name'] =  $Product['products']['product_name'];             
									$i++;
							}
					}else{
							//pr($search['cat']);exit;
							$i = 0;
							foreach($search['cat'] as $Product){
								$id[$i] = $Product['categories']['id'];
								$i++;
							}
							//pr($id);
							$prod = $this->Product->find('all',array("conditions" =>array('Product.category_id'=>$id),'recursive'=>0));
							//pr($prod);
							$subcate = array();
							$i = 0;
							foreach($prod as $Product){	
							
									$subcate[$i]['id'] =  $Product['Product']['id'];
									$subcate[$i]['name'] =  $Product['Product']['product_name'];            
									$i++;
							}
						}
					pr($subcate);exit;
					$this->request->data = $subcate;
					exit;
				}
				exit;
			}
			//pr('oops');
			exit;
		}
	}

}//End-Class
?>
