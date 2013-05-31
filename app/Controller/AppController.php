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
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
			'authError' => "You can't access that page",
			'authorize' => array('Controller')
        ),
    );

	public function isAuthorized($user) {
		return true;
	}

    public function beforeFilter() {
	    $this->Auth->allow();

		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
    }

}
