<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array(
		'Session',
		'Auth' => array(
			    'authenticate' => array(
				'Form' => array(
				    'fields' => array('username' => 'email')
				)
			    ),
			'authError' => "You can't access that page",
			'authorize' => array('Controller')
		)
	);

	public function beforeFilter() {
	   	$this->Auth->allow();
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
	}

	protected function _checkUser() {
		if($this->params["pass"]["0"] != $this->Auth->user('id')) {
			$this->redirect(array('controller' => 'Users', 'action' => 'view', $this->Auth->user('id')));
		}
	}

}
