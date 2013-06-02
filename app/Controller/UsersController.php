<?php

include('AppController.php');

class UsersController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
	}

	public function isAuthorized($user) {
		$this->Auth->allow();
	}

	public function add() {
	    if ($this->request->is('post')) {
	        $this->User->create();
	        if ($this->User->save($this->request->data)) {
				$this->Auth->login();
	            $this->Session->setFlash(__('You have successfully registered'));
	            $this->redirect(array('controller' => 'Users', 'action' => 'view', $this->User->id));
	        } else {
	            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
	        }
	    }
	}

	public function login() {
		if ($this->request->is('post')) {
		    if ($this->Auth->login()) {
	            $this->redirect(array('controller' => 'Users', 'action' => 'view', $this->Auth->user('id')));
		    } else {
		        $this->Session->setFlash(__('Invalid email or password, try again'));
		    }
		}
	}

	public function logout() {
		$this->Session->setFlash(_('You have successfully logged out'));
		$this->redirect($this->Auth->logout());
	}

	public function view($id=null) {
		$this->_checkuser();

		$this->User->id = $id;
	
		if (!$this->User->exists()) {
		    throw new NotFoundException(__('Invalid user'));
		}

		$this->set('user', $this->User->read(null, $id));
	}

}
?>
