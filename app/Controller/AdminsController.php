<?php 
class adminsController extends AppController {
	//Specify View folder
	var $name     = 'Admins';
	//Specify Layout
	//var $layout ='admin_login'; 
	//Specify  models(tables)	
	var $uses = array('Admin','User');	
	public $components = array('Session','Paginator');
	var $helpers = array('Session','Paginator');
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_login','admin_add','admin_logout','Auth');
    }
	
	public function admin_login() {
		$this->Auth->logout();
		if ($this->request->is('post')) {
			if ($this->Auth->login($this->data['User'])) {
				$this->Session->write("usertype",'Admin');
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}
	
	public function admin_logout() {
		$this->Session->destroy();
		return $this->redirect($this->Auth->logout());
	}
	
	public function admin_users() {
		$this->paginate = array(
			'limit' => 10,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }
	
	public function admin_edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'admin_users'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'admin_users'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'admin_edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
    }
	
	  public function admin_delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'admin_users'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'admin_users'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'admin_users'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'admin_users'));
    }
	
	public function admin_activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'admin_users'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'admin_users'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'admin_users'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'admin_users'));
    }
	

	
	

}