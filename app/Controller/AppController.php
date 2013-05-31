<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
			// Changes login requirements from username to email
		    'authenticate' => array(
		        'Form' => array(
		            'fields' => array('username' => 'email')
		        )
		    ),
			// loginRedirect and logoutRedirect 
            'loginRedirect' => array('controller' => 'users', 'action' => 'view'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'logout'),

			// Authentication error message
			'authError' => "You can't access that page",
			'authorize' => array('Controller')
        ),
    );

	public function isAuthorized($user) {
		return true;
	}

	// This method runs before all methods on all controllers 
	// Since it is in the AppController
    public function beforeFilter() {
	    $this->Auth->allow('view');

		// Creates boolean variable that determines if user is logged in
		$this->set('logged_in', $this->Auth->loggedIn());

		// Create variable that contains all information about user
		$this->set('current_user', $this->Auth->user());
    }

}
