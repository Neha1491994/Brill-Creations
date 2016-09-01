<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array('DebugKit.Toolbar','Auth');

 	var $breadcrumb=array('Home'=>'');
	//var $uses = array('Menu');//,'Email','Category');

        var $helpers = array('Form', 'Html');
		
	function beforeFilter(){
		$currentController = $this->params['controller'];
		$currentAction = $this->params['action'];
		$this->Auth->loginRedirect =  array('controller' => 'categories', 'action' => 'category_list');
		$this->Auth->authError = 'You must be logged in to view this page.';
		$this->Auth->loginError = 'Invalid Username or Password entered, please try again.';
		if($currentController == 'Admins'||($currentController =='reports' && in_array($currentAction,array('admin_add','admin_addtype','admin_listtypes')) )){
			$this->Auth->loginAction = array('controller'=>'Admins', 'action'=>'admin_login');
			$this->Auth->logoutRedirect = array('controller'=>'Admins', 'action'=>'admin_login');
			$this->Auth->authenticate = array(
                'Form' => array(
                    'userModel' => 'Admin',
                    'fields' => array(
                        'username' => 'username',
                        'password' => 'password'
                    )
                )
            );
		}else{
			$this->Auth->loginAction = array('controller'=>'Users', 'action'=>'login');
			$this->Auth->loginRedirect =  array('controller' => 'categories', 'action' => 'category_list');
			$this->Auth->logoutRedirect =array('controller' => 'categories', 'action' => 'category_list');
			$this->Auth->authenticate = array(
                'Form' => array(
                    'userModel' => 'User',
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password'
                    )
                )
            );
		
		}
	}
	function beforeRender() {
		$this->set('breadcrumbs',$this->breadcrumb);

	}
	

	
 
  /*
     *	This function image setting 
     */
    function uploadimgdef($source,$destination,$width=84,$height=108,$merge=0,$crop=0)
    {	
            $this->Snapshot->ImageFile=$source;
            $this->Snapshot->Resize = true;
            $this->Snapshot->ResizeScale = 100;
            $this->Snapshot->Position = 'topleft';
            $this->Snapshot->Compression = 80;
            $this->Snapshot->Width = $width;
            $this->Snapshot->Height = $height ;		
            $this->Snapshot->Merge = $merge ;
            $this->Snapshot->Crop = $crop ;
            // call funtion at last
            $this->Snapshot->SaveImageAs($destination);
    }
	
	
	
	
	
	
	function sendMail($to_email,$subject, $template='email_notification', $template_fields_array=array()){
		//$this->Email->reset();
		//return true;
		ignore_user_abort(true);
		App::uses('CakeEmail', 'Network/Email');
		$emailObj = new CakeEmail();
		$emailObj->viewVars($template_fields_array);
		$emailObj->config('gmail');
		$emailObj->template($template, 'default')
		->emailFormat('html')
		->subject($subject)
		->to($to_email)
		//->to(ADMIN_EMAIL)
		->send();
	}
	
}
