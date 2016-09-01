<?php

class CategoriesController extends AppController {
	var $uses = array('Category','Product','Gallery','User','Orderdetail','Order');
	public $components = array('Session','Paginator','RequestHandler','Qimage');
	var $helpers = array('Html', 'Form','Session','Paginator','Js' => array('Jquery'));

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('Categories.category_name' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_login','admin_add','category_list','nonfeaturedcat_list','ablut_us','contact_us','subcategory_list','login'); 
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
	public function login() {
		$this->layout='openuser_layout';
		if($this->Session->check('Auth.User')){
			$this->redirect(array('controller'=>'Categories','action' => 'category_list'));		
		}
		if ($this->request->is('post')) {
		//if already logged-in, redirect
		pr($this->request);exit;
		}
	}

	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}

public function admin_category_list() {
		$this->Paginator->settings= array(
		     'conditions' => array('Category.parent_id' => 0),
			'limit' => 10,
			'order' => array('Categories.category_name' => 'asc' )
		);
		$categorys = $this->Paginator->paginate('Category');
		$this->set(compact('categorys'));
    }
public function admin_subcategory_list($id = Null) {
	//pr($id);exit;
	
		$this->Paginator->settings = array(
		    'conditions' => array('Category.parent_id' => $id),
			'limit' => 10,
		    //'order' => array('Category.category_name' => 'asc' )
		);
		$categorys = $this->Paginator->paginate('Category');
		
		//pr($categorys);
		$catrg = $this->Category->find('first',array('conditions' => array('Category.id' => $categorys[0]['Category']['parent_id'])));
		//pr($catrg['Category']['category_name']);exit;
			   $this->Session->write("categ",$catrg['Category']['category_name']);
		$this->set(compact('categorys'));
    }

    public function admin_add($id = null) {
		//pr($id);exit;
		if($id)
		{     
	           $category = $this->Category->find('first', array('conditions' => array('Category.id' => $id)));
		       // pr($category);exit;
		      //pr($category['category_name']);exit;
		       if(isset($id)){
			     $this->Session->write("type",'Subcategory');
			     $this->Session->write("categ",$category['Category']['category_name']);
			    }
			    if ($this->request->is('post')){
				   $postdata=$this->request->data['Category'];
			       $this->Category->create();
		            if ($this->Category->save($postdata)){
		   		       $lastInsertedId = $this->Category->id;
				       if($lastInsertedId != null){
					     $this->Category->id = $lastInsertedId;
					     $this->Category->saveField("parent_id", $id);
				        }
				      $this->Session->setFlash(__('The Subcategory has been created'));
				      $this->redirect(array('action' => 'admin_subcategory_list',$id));
			        }   else {
				           $this->Session->setFlash(__('The Subcategory could not be created. Please, try again.'));
			            }	
			    }
			
		}else{
			$this->Session->delete('type');
			$this->Session->delete('categ');
			$this->Category->create();
            if ($this->request->is('post') || $this->request->is('put')) {
			  //pr($this->request->data['Category']['logo_file']);exit;
			   $postData=$this->data['Category'];
			   
			   //pr($postData);exit;
			   $data['category_name']=$postData['category_name'];
			   $data['description']=$postData['description'];
			   $data['Featured']=$postData['Featured'];
			    if ($this->Category->save($data)) {
				 //upload logo 
                 //pr($postData['logo_file']);exit;
				   $lastInsertedId = $this->Category->id;
				    if(is_array($postData['logo_file']) && $postData['logo_file']['name']!='') {
					    $name = explode('.', $postData['logo_file']['name']);
					    //pr($name);exit;
						$ext	=	strtolower($name[count($name)-1]);
						$file_name = 'logo_file'.$lastInsertedId.'_'.strtotime(date('Y-m-d H:i:s')).".".$ext;
						$finalPath = "../webroot/files/category/";
						$postData['logo_file']['name']= $file_name;
						//pr($postData['logo_file']);exit;
						$imagedata['file'] = $postData['logo_file'];
						$imagedata['path'] = $finalPath;
						//pr($imagedata);exit;
						$uploadedImage = $this->Qimage->copy($imagedata);
						$thumbData['file'] = $uploadedImage;
						$thumbData['width'] = '334';
						$thumbData['height'] = '334';
						$thumbData['output'] = "../webroot/files/category200x200/";
						$this->Qimage->resize($thumbData);
						
						$errors = $this->Qimage->getErrors();
						if(count($errors)>0){
							//pr($errors);exit;
						}
						 else{
							
							$data = array();
							//$this->Gallery>create();
                            $data['Category']['id'] = $lastInsertedId;
							$data['Category']['logo_file'] = $file_name;
							//pr($data['Gallary']);
							$this->Category->saveAll($data['Category']);							 
						}
					}
				}
				  $this->Session->setFlash(__('The Category has been created'));
				  $this->redirect(array('action' => 'admin_category_list'));
			} else {
				  $this->Session->setFlash(__('The Category could not be created. Please, try again.'));
		        }	
        }
	    
    }

    public function admin_edit($id = null,$pid = null) {
		//pr($pid);exit;

		  
			$Category = $this->Category->findById($id);
			
		    
			if($id)
			{  $this->Category->recursive = 0;
			   $category = $this->Category->find('first', array('conditions' => array('Category.id' => $id)));
			  //pr($category);exit;
			   //pr($category['category_name']);exit;
				   if($category['Category']['parent_id'] != 0){
				   $this->Session->write("type",'Subcategory');
				   $this->Session->write("categ",$category['Category']['category_name']);
			      }
				  else{
					$this->Session->write("type",'Category');
				   $this->Session->write("categ",$category['Category']['category_name']);
				  }
			}
			
			if ($this->request->is('post') || $this->request->is('put')){
				$this->Category->id = $id;
				//pr($category);
				if ($this->Category->save($this->request->data)) {
					
					$this->Session->setFlash(__('The Category has been updated'));
					//pr($category['Category']['parent_id']);exit;
					if($category['Category']['parent_id'] != 0){
					$this->redirect(array('action' => 'subcategory_list',$category['Category']['parent_id']));
					}else{
						$this->redirect(array('action' => 'admin_category_list'));
					}
				}else{
					$this->Session->setFlash(__('Unable to update your Category.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $Category;
			}
    }

     public function admin_delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a category id');
			$this->redirect(array('action'=>'category_list'));
		}
		
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            $this->Session->setFlash('Invalid category id provided');
			$this->redirect(array('action'=>'category_list'));
        }
        if ($this->Category->saveField('status', 0)) {
			$cid = array();
			$i = 0;
			$this->Category->query("UPDATE categories set status = 0 where parent_id = '".$id."' ");
			$cate= $this->Category->find('list',array("conditions" =>array('Category.parent_id'=>$id)));
			//pr($cate);
				foreach($cate as $c){
					//pr($c);exit;
					$this->Product->query("UPDATE products set status ='Inactive' where category_id = '".$c."' ");
				}
            $this->Session->setFlash(__('category deleted'));
            $this->redirect(array('action' => 'category_list'));
        }
        $this->Session->setFlash(__('Category was not deleted'));
        $this->redirect(array('action' => 'category_list'));
    }
	
	public function admin_activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a category id');
			$this->redirect(array('action'=>'category_list'));
		}
		
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            $this->Session->setFlash('Invalid category id provided');
			$this->redirect(array('action'=>'category_list'));
        }
        if ($this->Category->saveField('status', 1)) {
			$this->Category->query("UPDATE categories set status = 1 where parent_id = '".$id."' ");
			$cate= $this->Category->find('list',array("conditions" =>array('Category.parent_id'=>$id)));
			//pr($cate);
				foreach($cate as $c){
					//pr($c);exit;
					$this->Product->query("UPDATE products set status ='Active' where category_id = '".$c."' ");
				}
            $this->Session->setFlash(__('Category re-activated'));
            $this->redirect(array('action' => 'category_list'));
        }
        $this->Session->setFlash(__('Category was not re-activated'));
        $this->redirect(array('action' => 'category_list'));
    }
	
	public function subcategory_list($id = Null) {
	//pr($id);exit;
	$this->layout='openuser_layout';
	    $this->Category->recursive = 2;
		$this->Paginator->settings = array(
		    'conditions' => array('Category.parent_id' => $id),
			'limit' => 12,
		    //'order' => array('Category.category_name' => 'asc' )
		);
		$categorys = $this->Paginator->paginate('Category');
		$i=0;
		foreach($categorys as $category){
			
			if(is_array($category['Product']) && $category['Product']!=''){
		   	 $categorys[$i]['Category']['logo'] = $category['Product'][0]['Gallery'][0]['images'];
			}
			else{
				$categorys[$i]['Category']['logo']='';
			}
		    $i++;
			
		}
		 
		$catrg = $this->Category->find('first',array('conditions' => array('Category.id' => $categorys[0]['Category']['parent_id'])));
	
			   $this->Session->write("categ",$catrg['Category']['category_name']);
			//pr($categorys);   
		$this->set(compact('categorys'));
    }
	
public function nonfeaturedcat_list(){
		$categories = $this->Category->find('all', array(
		                                                 'conditions' => array('Category.parent_id' => 0,
												         //'AND' => array('Category.Featured' => 0)
												    )
												)
										    );
	//$this->set(compact('categories'));
	 return $categories;
}	
public function category_list(){
		
		$this->layout='openuser_layout';
		$featuredcategory = $this->Category->find('all', array(
		                                                 'conditions' => array('Category.parent_id' => 0,
												         'AND' => array('Category.Featured' => 1)
												    )
												)
										    );				
		//pr($categories);exit;
		$this->set(compact('featuredcategory'));
	}

	public function ablut_us() {
		$this->layout='openuser_layout';

	}
	public function contact_us() {
		$this->layout='openuser_layout';
		 if ($this->request->is('post')) {
			 
			$this->Contact->create();	
			if($this->Contact->save($this->request->data) ){
				$this->Session->setFlash(__('Thanks,You got a mail soon' ));
				$this->redirect(array('action' => 'category_list'));
			} else {
				$this->Session->setFlash(__('Internal error. Please, try again.'));
			}	
        }

	}
}	

?>