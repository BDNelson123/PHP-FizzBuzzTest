<?php

include('AppController.php');

class UsersController extends AppController {

	// This method runs before all methods on the user controller 
	// parent::beforeFilter() is added so that it also includes the beforeFilter() on the AppController
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add');
	}

	// Checks to see if user is viewing his/her own profile page
	public function isAuthorized($user) {
		if(in_array($this->action, array('view'))) {
			if($user['id'] != $this->request->params['pass'][0])  {
				return false;
			} 
		}
		return true;
	}

	// Register new user
	public function add() {
	    if ($this->request->is('post')) {
	        $this->User->create();
	        if ($this->User->save($this->request->data)) {
	            $this->Session->setFlash(__('The user has been saved'));
	            $this->redirect(array('controller' => 'Users', 'action' => 'view', $this->User->id));
	        } else {
	            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	        }
	    }
	}

	// Login as a user
	public function login() {
		if ($this->request->is('post')) {
		    if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
		    } else {
		        $this->Session->setFlash(__('Invalid email or password, try again'));
		    }
		}
	}

	// Logout as a user
	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	// User profile page
	public function view($id=null) {
		$this->User->id = $id;
	
		if (!$this->User->exists()) {
		    throw new NotFoundException(__('Invalid user'));
		}

		$this->set('user', $this->User->read(null, $id));
	}

}
?>
